<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    public function getAllServices()
    {
        return Service::all();
    }

    public function getServiceByName($name)
    {
        return Service::where('service_name', $name)->get(); // Fetch all matching records
    }
    
}
