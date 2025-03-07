<?php

namespace App\Repositories;
use App\Http\Controllers\MembershipTypeController;

use App\Models\MembershipType;

class MembershipTypeRepository
{
    public function getAllMembershipTypes()
    {
        return MembershipType::all();
    }

    public function create(array $data)
    {
        if (MembershipType::where('priority', $data['priority'])->exists()) {
            return ['error' => 'Priority value already exists'];
        }
        if (MembershipType::where('membership_type', $data['membership_type'])->exists()) {
            return ['error' => 'Name entered already exists'];
        }
        return MembershipType::create($data);
    }

    public function update($membershipType, array $data)
    {
        $existing = MembershipType::where('membership_type', $membershipType)->first();
        if (!$existing) {
            return ['error' => 'Membership you are trying to update does not exist'];
        }
        if (MembershipType::where('membership_type', $data['membership_type'])->where('membership_type', '!=', $membershipType)->exists()) {
            return ['error' => 'Name entered already exists'];
        }
        if (MembershipType::where('priority', $data['priority'])->where('membership_type', '!=', $membershipType)->exists()) {
            return ['error' => 'Priority entered already exists'];
        }
        $existing->update($data);
        return $existing;
    }

    public function delete($membershipType)
    {
        $existing = MembershipType::where('membership_type', $membershipType)->first();
        if (!$existing) {
            return ['error' => 'Membership type does not exist'];
        }
        $existing->delete();
        return ['success' => 'Membership type deleted successfully'];
    }
}
