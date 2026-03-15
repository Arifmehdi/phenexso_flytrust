<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Media;
use App\Models\Location; // Assuming Location model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with(['addedBy', 'editedBy', 'location'])->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all(); // Assuming you want to select a location
        return view('admin.hotels.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For main image
            'banner_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For banner
            'location_id' => 'required|exists:locations,id',
            'address' => 'nullable|string|max:255',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'map_zoom' => 'nullable|integer',
            'is_featured' => 'boolean',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For multiple images
            'video' => 'nullable|string|max:255', // YouTube Video
            'policy' => 'nullable|string',
            'star_rate' => 'nullable|integer|min:1|max:5',
            'price' => 'nullable|numeric',
            'check_in_time' => 'nullable|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'allow_full_day' => 'boolean',
            'sale_price' => 'nullable|numeric',
            'status' => 'required|string|in:publish,draft',
        ]);

        $data = $request->except(['image_file', 'banner_image_file', 'gallery_files']);
        $data['slug'] = Str::slug($request->input('title'));
        $data['create_user'] = Auth::id();
        $data['update_user'] = Auth::id();
        $data['is_featured'] = $request->has('is_featured');
        $data['allow_full_day'] = $request->has('allow_full_day');

        // Handle main image upload
        if ($request->hasFile('image_file')) {
            $media = $this->uploadAndSaveMedia($request->file('image_file'));
            $data['image_id'] = $media->id;
        }

        // Handle banner image upload
        if ($request->hasFile('banner_image_file')) {
            $media = $this->uploadAndSaveMedia($request->file('banner_image_file'));
            $data['banner_image_id'] = $media->id;
        }

        $hotel = Hotel::create($data);

        // Handle gallery images
        if ($request->hasFile('gallery_files')) {
            $galleryIds = [];
            foreach ($request->file('gallery_files') as $file) {
                $media = $this->uploadAndSaveMedia($file);
                $galleryIds[] = $media->id;
            }
            $hotel->gallery = $galleryIds;
            $hotel->save();
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $hotel->load(['addedBy', 'editedBy', 'location', 'mainImage', 'bannerImage']);
        $galleryImages = collect();
        if (is_array($hotel->gallery) && count($hotel->gallery) > 0) {
            $galleryImages = Media::whereIn('id', $hotel->gallery)->get();
        }

        return view('admin.hotels.show', compact('hotel', 'galleryImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $locations = Location::all();
        $hotel->load(['mainImage', 'bannerImage']);
        $galleryImages = collect();
        if (is_array($hotel->gallery) && count($hotel->gallery) > 0) {
            $galleryImages = Media::whereIn('id', $hotel->gallery)->get();
        }
        return view('admin.hotels.edit', compact('hotel', 'locations', 'galleryImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_id' => 'required|exists:locations,id',
            'address' => 'nullable|string|max:255',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'map_zoom' => 'nullable|integer',
            'is_featured' => 'boolean',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|string|max:255',
            'policy' => 'nullable|string',
            'star_rate' => 'nullable|integer|min:1|max:5',
            'price' => 'nullable|numeric',
            'check_in_time' => 'nullable|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'allow_full_day' => 'boolean',
            'sale_price' => 'nullable|numeric',
            'status' => 'required|string|in:publish,draft',
            'delete_gallery_images' => 'nullable|array', // Array of Media IDs to delete
            'delete_gallery_images.*' => 'exists:media,id',
        ]);

        $data = $request->except(['image_file', 'banner_image_file', 'gallery_files', 'delete_gallery_images']);
        $data['slug'] = Str::slug($request->input('title'));
        $data['update_user'] = Auth::id();
        $data['is_featured'] = $request->has('is_featured');
        $data['allow_full_day'] = $request->has('allow_full_day');

        // Handle main image update
        if ($request->hasFile('image_file')) {
            if ($hotel->image_id) {
                $this->deleteMediaRecord($hotel->image_id);
            }
            $media = $this->uploadAndSaveMedia($request->file('image_file'));
            $data['image_id'] = $media->id;
        }

        // Handle banner image update
        if ($request->hasFile('banner_image_file')) {
            if ($hotel->banner_image_id) {
                $this->deleteMediaRecord($hotel->banner_image_id);
            }
            $media = $this->uploadAndSaveMedia($request->file('banner_image_file'));
            $data['banner_image_id'] = $media->id;
        }

        $hotel->update($data);

        // Handle gallery images deletion
        $currentGalleryIds = is_array($hotel->gallery) ? $hotel->gallery : [];
        if ($request->has('delete_gallery_images')) {
            foreach ($request->input('delete_gallery_images') as $mediaIdToDelete) {
                $this->deleteMediaRecord($mediaIdToDelete);
                $currentGalleryIds = array_diff($currentGalleryIds, [$mediaIdToDelete]);
            }
        }

        // Handle new gallery images
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $media = $this->uploadAndSaveMedia($file);
                $currentGalleryIds[] = $media->id;
            }
        }
        $hotel->gallery = array_values($currentGalleryIds); // Reindex array
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        // Delete associated media records and files
        if ($hotel->image_id) {
            $this->deleteMediaRecord($hotel->image_id);
        }
        if ($hotel->banner_image_id) {
            $this->deleteMediaRecord($hotel->banner_image_id);
        }
        if (is_array($hotel->gallery)) {
            foreach ($hotel->gallery as $mediaId) {
                $this->deleteMediaRecord($mediaId);
            }
        }

        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }

    /**
     * Helper function to upload a file and save a Media record.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return \App\Models\Media
     */
    private function uploadAndSaveMedia($file)
    {
        $path = 'uploads/hotels';
        $originalName = $file->getClientOriginalName();
        $name = time() . '_' . $originalName;
        $file->move(public_path($path), $name);

        // Create Media record
        $media = Media::create([
            'file_name' => $name,
            'file_path' => $path . '/' . $name,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            // Add other relevant media fields if available in your Media model
        ]);

        return $media;
    }

    /**
     * Helper function to delete a Media record and its associated file.
     *
     * @param int $mediaId
     * @return bool
     */
    private function deleteMediaRecord($mediaId)
    {
        $media = Media::find($mediaId);
        if ($media) {
            $fullPath = public_path($media->file_path);
            if (file_exists($fullPath)) {
                unlink($fullPath); // Delete the file
            }
            $media->delete(); // Delete the record from the database
            return true;
        }
        return false;
    }
}
