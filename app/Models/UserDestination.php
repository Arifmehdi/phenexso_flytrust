<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDestination extends Model
{
    use HasFactory;

    protected $table = 'user_destinations';

    protected $fillable = [
        'destination_name',
        'country',
        'latitude',
        'longitude',
        'address',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];
}
