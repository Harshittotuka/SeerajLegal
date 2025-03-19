<?php
// app/Repositories/AdminRepository.php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
      public function findById($id)
    {
        return Admin::find($id);
    }
    
    public function create(array $data)
    {
        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'profile_image' => $data['profile_image'],
            'type' => $data['type'],
        ]);

        return $admin;
    }

    public function update($id, array $data)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? bcrypt($data['password']) : $admin->password,
            'phone' => $data['phone'],
            'profile_image' => $data['profile_image'],
            'type' => $data['type'],
        ]);

        return $admin;
    }

   public function delete($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return false; // Admin not found
        }

        return $admin->delete();
    }
}
