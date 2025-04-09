<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'dob', 'address', 'city', 'state', 'country', 'pincode', 'aadharName', 'aadharNumber', 'aadharImage', 'panName', 'panNumber', 'panImage', 'degreeProof', 'certificationProof', 'membershipType', 'status'];

    public function type()
    {
        return $this->belongsTo(MembershipType::class, 'membershipType', 'membershipType');
    }
}
