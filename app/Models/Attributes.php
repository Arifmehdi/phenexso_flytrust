<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $table = 'bravo_attrs';
    protected $fillable = [
        'name',
        'slug',
        'service',
        'hide_in_filter_search',
        'position',
        'create_user',
        'update_user',
        'deleted_at',
        'created_at',
        'updated_at',
        'display_type',
        'hide_in_single'
    ];
}