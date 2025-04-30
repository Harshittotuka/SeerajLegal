<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'dob',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'collegeName',
        'degree',
        'graduationYear',
        'status',
        'membershipType',
        'coverLetter',
        'resumePath', // Path to the uploaded resume
        'price',
        'statement_number',
        'payment_image_path',
        'payment_submitted',
        'UserStatusId',
    ];
}
