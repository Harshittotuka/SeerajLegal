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
    public function createMember($data)
    {
        
        return $this->membershipRepository->createMember($data);
    }

    public function deleteMember($id)
    {
        return $this->membershipRepository->deleteMember($id);
    }
    public function updateMember($id, $data)
    {
        return $this->membershipRepository->updateMember($id, $data);
    }
}
