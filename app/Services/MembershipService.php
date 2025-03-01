<?php

namespace App\Services;

use App\Repositories\MembershipRepository;

class MembershipService
{
    protected $membershipRepository;

    public function __construct(MembershipRepository $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    public function getAllMembers()
    {
        return $this->membershipRepository->getAllMembers();
    }
}
