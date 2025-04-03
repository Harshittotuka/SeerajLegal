<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams'; // Table name

    protected $fillable = [
        'name',
        'designation',
        'area_of_practice',
        'adr_services',
        'all_rounder',
        'type',
        'email',
        'phone',
        'experience',
        'education',
        'awards',
        'socials',
        'profile_image',
    ];

    protected $casts = [
        'area_of_practice' => 'array',
        'adr_services' => 'array',
        'all_rounder' => 'boolean',
        'experience' => 'array',
        'education' => 'array',
        'awards' => 'array',
        'socials' => 'array', // Stores multiple links as JSON
    ];
}
