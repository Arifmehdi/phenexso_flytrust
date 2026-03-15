<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Media;
use App\Models\Location; // Added for Location relationship

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'bravo_hotels';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_id',
        'banner_image_id',
        'location_id',
        'address',
        'map_lat',
        'map_lng',
        'map_zoom',
        'is_featured',
        'gallery',
        'video', // Assuming this is for youtube_video, will rename in controller/views
        'policy',
        'star_rate',
        'price',
        'check_in_time',
        'check_out_time',
        'allow_full_day',
        'sale_price',
        'related_ids',
        'status',
        'create_user',
        'update_user',
    ];

    protected $casts = [
        'gallery' => 'array', // Cast gallery to array for easier handling
    ];

    /**
     * Get the user who added the hotel.
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'create_user');
    }

    /**
     * Get the user who last edited the hotel.
     */
    public function editedBy()
    {
        return $this->belongsTo(User::class, 'update_user');
    }

    /**
     * Get the location of the hotel.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Get the main image for the hotel.
     */
    public function mainImage()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /**
     * Get the banner image for the hotel.
     */
    public function bannerImage()
    {
        return $this->belongsTo(Media::class, 'banner_image_id');
    }

    // Accessor for the "Reviews" in the index table, assuming star_rate is the review.
    public function getReviewsAttribute()
    {
        return $this->star_rate;
    }

    // Accessor for "Name"
    public function getNameAttribute()
    {
        return $this->title;
    }
}

