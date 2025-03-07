<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $primaryKey = 'Sno'; // Set primary key to Sno

    protected $fillable = ['Question', 'Answer'];
}