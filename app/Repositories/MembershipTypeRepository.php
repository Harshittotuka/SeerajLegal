<?php

namespace App\Repositories;

use App\Models\MembershipType;

class MembershipTypeRepository
{
    public function getAllMembershipTypes()
    {
        return MembershipType::all();
    }
}
