<?php
namespace App\Http\Controllers;

use App\User;
use App\Models\Hotel;
use App\Models\UserDestination;
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
use Illuminate\Support\Facades\Http;

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
        // This method is not currently used (FrontendController@index is used for homepage)
        // But keeping it for consistency in case routes change
        $countries = UserDestination::select('country')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        $savedDestinations = UserDestination::select('destination_name', 'country')
            ->distinct()
            ->orderBy('destination_name')
            ->get()
            ->pluck('country', 'destination_name');

        $destinationNames = UserDestination::select('destination_name')
            ->distinct()
            ->orderBy('destination_name')
            ->pluck('destination_name');

        return view('website.index', compact('countries', 'savedDestinations', 'destinationNames'));
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

                        $latitude = $hotelData['latitude'] ?? null;
                        $longitude = $hotelData['longitude'] ?? null;
                        $address = $hotelData['address'] ?? '';

                        // If no address but have coordinates, use coordinates as address
                        if (empty($address) && $latitude && $longitude) {
                            $address = "Location: $latitude, $longitude";
                        }

                        // Try to get country from coordinates if not already in address
                        $country = null;
                        if ($latitude && $longitude) {
                            // Check if country is already in the agoda data
                            if (isset($hotelData['country'])) {
                                $country = $hotelData['country'];
                            } else {
                                // Try to extract country from address via reverse geocoding
                                $country = $this->getCountryFromCoordinates($latitude, $longitude);
                            }

                            // Save to user_destinations table (only if country is found and lat/lng exist)
                            if ($country && $latitude && $longitude) {
                                try {
                                    UserDestination::updateOrCreate(
                                        [
                                            'country' => $country,
                                            'latitude' => $latitude,
                                            'longitude' => $longitude,
                                        ],
                                        [
                                            'destination_name' => $cityName,
                                            'address' => $address,
                                        ]
                                    );
                                } catch (\Exception $e) {
                                    \Log::error("Failed to save user destination: " . $e->getMessage());
                                }
                            }
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
                                'agoda_data' => array_merge($hotelData, [
                                    'cityId' => $cityId,
                                    'address' => $address,
                                    'country' => $country,
                                    'latitude' => $latitude,
                                    'longitude' => $longitude
                                ]),
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

        // 2. Country Filter (from saved destinations)
        if ($request->has('country')) {
            $query->where(function($q) use ($request) {
                // Check if country exists in agoda_data JSON or in the extracted country field
                $q->where('agoda_data->country', $request->country)
                  ->orWhere('agoda_data->country', 'like', '%' . $request->country . '%');
            });
        }

        // 3. Price Filter
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // 4. Star Rating Filter
        if ($request->has('stars') && is_array($request->stars)) {
            $query->whereIn('star_rate', $request->stars);
        }

        // 5. Review Score Filter (checking against agoda_data json)
        if ($request->has('review_score') && is_array($request->review_score)) {
            $query->where(function($q) use ($request) {
                foreach ($request->review_score as $score) {
                    $q->orWhere('agoda_data->reviewScore', '>=', (float)$score);
                }
            });
        }

        // 6. Sorting
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

        // Get distinct countries from user_destinations for filter dropdown
        $countries = UserDestination::select('country')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('website.hotel', compact('hotels', 'countries'));
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

    /**
     * Get country name from latitude and longitude using reverse geocoding
     */
    private function getCountryFromCoordinates($lat, $lng)
    {
        try {
            $response = Http::get('https://nominatim.openstreetmap.org/reverse', [
                'format' => 'json',
                'lat' => $lat,
                'lon' => $lng,
                'zoom' => 5,
                'addressdetails' => 1,
                'accept-language' => 'en', // Force English response
                'user-agent' => 'flytrust-hotel-app'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['address']['country'])) {
                    return $data['address']['country'];
                }
            }
        } catch (\Exception $e) {
            \Log::error('Reverse geocoding failed: ' . $e->getMessage());
        }

        return null;
    }
}
