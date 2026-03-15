<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCategory extends Model
{
    use HasFactory;
    protected $table = 'location_category';
    protected $fillable = [
        'name', 
        'icon_class', 
        'content', 
        'slug', 
        'status', 
        '_lft', 
        '_rgt', 
        'parent_id', 
        'create_user', 
        'update_user', 
        'deleted_at', 
        'origin_id', 
        'lang', 

    ];
}
