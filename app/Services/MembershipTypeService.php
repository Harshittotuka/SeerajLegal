<?php

namespace App\Services;
use App\Models\MembershipType;
use App\Repositories\MembershipTypeRepository;
use App\Http\Controllers\MembershipTypeController;


class MembershipTypeService
{
    protected $membershipTypeRepository;

    public function __construct(MembershipTypeRepository $membershipTypeRepository)
    {
        $this->membershipTypeRepository = $membershipTypeRepository;
    }

    public function getAllMembershipTypes()
    {
        return $this->membershipTypeRepository->getAllMembershipTypes();
    }

    public function createMembershipType(array $data)
    {
        return $this->membershipTypeRepository->create($data);
    }

    public function updateMembershipType($membershipType, array $data)
    {
        return $this->membershipTypeRepository->update($membershipType, $data);
    }

    public function deleteMembershipType($membershipType)
    {
        return $this->membershipTypeRepository->delete($membershipType);
    }
}
