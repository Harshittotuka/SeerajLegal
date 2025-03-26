<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopImage extends Model {
    use HasFactory;

    protected $table = 'topimages'; // Custom table name

    protected $fillable = [
        'image_id', 'page_name', 'title', 'sub_title', 'image_url', 'image_resolution', 'icon'
    ];

    protected $casts = [
        'image_resolution' => 'array', // JSON cast for resolution
    ];
}
