<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Practice extends Model
{
    use HasFactory;

    protected $table = 'practices'; // Table name

    protected $fillable = [
        'practice_name','para_sno','title','para','points','what_we_provide','flag','image_path','icon','top_image'
    ];

    protected $casts = [
        'points' => 'array', // Automatically cast JSON data to an array
        'what_we_provide' => 'array',
    ];
}
