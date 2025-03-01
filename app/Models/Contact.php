<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'address', 'phone_no', 'phone_2', 'yrs_of_experience',
        'insta_link', 'facebook_link', 'youtube_link', 'twitter_link',
        'whatsapp', 'linkedin', 'website_link'
    ];
}
