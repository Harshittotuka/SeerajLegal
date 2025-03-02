<?php

namespace App\Services;

use App\Repositories\MembershipTypeRepository;

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
}
