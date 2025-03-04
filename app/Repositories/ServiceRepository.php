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
    public function fetchUniqueServiceNames()
    {
        return Service::select('service_name')->distinct()->pluck('service_name');
    }

    public function create(array $data)
    {
        $data['points'] = json_encode($data['points'] ?? []);
        return Service::create($data);
    }
}
