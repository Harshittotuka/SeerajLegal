<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name','para_sno','title','para','points','rules','flag',
    ];
    protected $casts = [
        'points' => 'array', // ✅ Automatically converts JSON to array when fetching
    ];
   
}