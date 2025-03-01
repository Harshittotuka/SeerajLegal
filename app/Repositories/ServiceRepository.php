<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    public function getAllServices()
    {
        return Service::all();
    }
}
