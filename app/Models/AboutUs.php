<?php
// app/Models/About.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'para', 'points', 'status', 'image'];

    protected $casts = [
        'points' => 'array',
        'image' => 'array',
    ];
}
