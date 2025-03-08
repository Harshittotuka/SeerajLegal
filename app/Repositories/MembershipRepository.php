<?php

namespace App\Repositories;
use App\Services\MembeshipService;
use App\Models\Member;

class MembershipRepository
{
    public function getAllMembers()
    {
        return Member::all();
    }
    public function createMember($data)
    {
        
        return Member::create($data);
    }

    public function deleteMember($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            return true;
        }
        return false;
    }
    public function updateMember($id, $data)
    {
        $member = Member::find($id);

        if (!$member) {
            return null;
        }

        $member->update($data);

        return $member;
    }
}
