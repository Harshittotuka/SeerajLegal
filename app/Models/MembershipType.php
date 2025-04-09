<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    use HasFactory;

    protected $fillable = ['membershipType', 'priority', 'price', 'duration'];

    // Mutator for membershipType attribute
    public function setMembershipTypeAttribute($value)
    {
        $this->attributes['membershipType'] = ucfirst($value);
    }
}
