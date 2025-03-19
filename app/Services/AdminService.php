<?php
// app/Services/AdminService.php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService
{
    protected $adminRepo;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }

     public function getAccountById($id)
    {
        return $this->adminRepo->findById($id);
    }

    public function createAdmin(array $data)
    {
        return $this->adminRepo->create($data);
    }

    public function editAdmin($id, array $data)
    {
        return $this->adminRepo->update($id, $data);
    }

    public function deleteAdmin($id)
    {
        return $this->adminRepo->delete($id);
    }
}
