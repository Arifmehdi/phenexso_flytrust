<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'bravo_locations';
    protected $fillable = [
        'name',
        'content',
        'slug',
        'image_id',
        'map_lat',
        'map_lng',
        'map_zoom',
        'status',
        '_lft',
        '_rgt',
        'parent_id',
        'create_user',
        'update_user',
        'deleted_at',
        'origin_id',
        'lang',
        'created_at',
        'updated_at',
        'banner_image_id',
        'trip_ideas',
        'gallery'
    ];
}
