<?php

namespace App\Repositories;

use App\Models\Member;

class MembershipRepository
{
    public function getAllMembers()
    {
        return Member::all();
    }
}
