<?php
namespace App\Http\Controllers;

use App\User;
use App\Models\Hotel;
use Modules\Location\Models\LocationCategory;
use Modules\Page\Models\Page;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\AgodaService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WebsiteHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('website.index');
    }

    public function flight()
    {
        return view('website.flight');
    }

    public function tour()
    {
        return view('website.tour');
    }

    public function hotel(Request $request, AgodaService $agodaService)
    {
        $destination = $request->input('destination');
        $cacheLimit = Carbon::now()->subMinutes(15);
        
        \Log::info('Hotel search initiated', ['destination' => $destination, 'params' => $request->all()]);

        // Define default cities to sync if no destination is provided or to keep database fresh
        $defaultCities = [
            'Dhaka' => 9395,
            'Bangkok' => 9395, // Note: PDF used 9395 for Bangkok too in examples
            'Dubai' => 14545,
            'Singapore' => 4064,
            'Cox\'s Bazar' => 17188
        ];

        $citiesToSync = [];

        if (!empty($destination)) {
            $cityId = $agodaService->getCityIdByName($destination);
            if ($cityId) {
                $citiesToSync[$destination] = $cityId;
            }
        } else {
            // If no destination, we check our default popular cities for refresh
            foreach ($defaultCities as $name => $id) {
                $citiesToSync[$name] = $id;
            }
        }

        foreach ($citiesToSync as $cityName => $cityId) {
            $isFresh = Hotel::where('agoda_hotel_id', '!=', null)
                ->where('agoda_last_synced_at', '>', $cacheLimit)
                ->where('agoda_data->cityId', $cityId)
                ->exists();

            if (!$isFresh) {
                \Log::info("Syncing city: $cityName (ID: $cityId) from Agoda API");
                
                // Parse date range (Site default is DD/MM/YYYY)
                $checkIn = now()->addDays(1)->format('Y-m-d');
                $checkOut = now()->addDays(2)->format('Y-m-d');
                
                if ($request->input('daterange')) {
                    $parts = explode(' - ', $request->input('daterange'));
                    if (count($parts) == 2) {
                        try {
                            $checkIn = Carbon::createFromFormat('d/m/Y', trim($parts[0]))->format('Y-m-d');
                            $checkOut = Carbon::createFromFormat('d/m/Y', trim($parts[1]))->format('Y-m-d');
                        } catch (\Exception $e) {
                            try {
                                $checkIn = Carbon::parse(trim($parts[0]))->format('Y-m-d');
                                $checkOut = Carbon::parse(trim($parts[1]))->format('Y-m-d');
                            } catch (\Exception $e2) {
                                \Log::error("Date parsing failed: " . $request->input('daterange'));
                            }
                        }
                    }
                }

                $data = $agodaService->searchByCity(
                    $cityId,
                    $checkIn,
                    $checkOut,
                    $request->input('adults', 2),
                    $request->input('children', 0),
                    $request->input('rooms', 1),
                    'USD',
                    'en-us',
                    20 
                );

                if (isset($data['results']) && is_array($data['results'])) {
                    foreach ($data['results'] as $hotelData) {
                        $agodaId = $hotelData['hoteld'] ?? $hotelData['hotelId'] ?? null;
                        if (!$agodaId) continue;

                        $address = $hotelData['address'] ?? '';
                        if (empty($address) && isset($hotelData['latitude']) && isset($hotelData['longitude'])) {
                            $address = "Location: " . $hotelData['latitude'] . ", " . $hotelData['longitude'];
                        }

                        Hotel::updateOrCreate(
                            ['agoda_hotel_id' => $agodaId],
                            [
                                'title' => $hotelData['hotelName'] ?? 'Agoda Hotel',
                                'slug' => Str::slug($hotelData['hotelName'] ?? 'agoda-hotel') . '-' . $agodaId,
                                'star_rate' => $hotelData['starRating'] ?? 0,
                                'price' => $hotelData['dailyRate'] ?? 0,
                                'address' => $address,
                                'status' => 'publish',
                                'agoda_last_synced_at' => Carbon::now(),
                                'agoda_data' => array_merge($hotelData, ['cityId' => $cityId, 'address' => $address]),
                            ]
                        );
                    }
                    \Log::info("Successfully synced $cityName.");
                }
            } else {
                \Log::info("Data for $cityName is fresh in database.");
            }
        }

        // Final query to display hotels
        $query = Hotel::where('status', 'publish');

        // 1. Destination Filter
        if (!empty($destination)) {
            $query->where(function($q) use ($destination) {
                $q->where('title', 'like', '%' . $destination . '%')
                  ->orWhere('address', 'like', '%' . $destination . '%')
                  ->orWhereHas('location', function($loc) use ($destination) {
                      $loc->where('name', 'like', '%' . $destination . '%');
                  });
            });
        }

        // 2. Price Filter
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // 3. Star Rating Filter
        if ($request->has('stars') && is_array($request->stars)) {
            $query->whereIn('star_rate', $request->stars);
        }

        // 4. Review Score Filter (checking against agoda_data json)
        if ($request->has('review_score') && is_array($request->review_score)) {
            $query->where(function($q) use ($request) {
                foreach ($request->review_score as $score) {
                    $q->orWhere('agoda_data->reviewScore', '>=', (float)$score);
                }
            });
        }

        // 5. Sorting
        $sort = $request->input('sort', 'default');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'star_desc':
                $query->orderBy('star_rate', 'desc');
                break;
            case 'star_asc':
                $query->orderBy('star_rate', 'asc');
                break;
            default:
                $query->orderBy('agoda_last_synced_at', 'desc'); // Default to newest/synced
                break;
        }

        $hotels = $query->with(['location', 'mainImage'])->paginate(12);
        
        return view('website.hotel', compact('hotels'));
    }

    public function visa()
    {
        return view('website.visa');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function supportpolicy()
    {
        return view('website.support');
    }

    public function terms()
    {
        return view('website.terms');
    }

    public function privacypolicy()
    {
        return view('website.privacy');
    }
}
