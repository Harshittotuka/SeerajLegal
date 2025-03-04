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
    public function deleteByName($name): bool
{
    try {
        // Delete all services with the given name
        $deleted = Service::where('service_name', $name)->delete();

        if ($deleted > 0) {
            \Log::info("Deleted services with name: " . $name);
            return true;
        } else {
            \Log::warning("No service found with name: " . $name);
            return false;
        }
    } catch (\Exception $e) {
        \Log::error("Error deleting service: " . $e->getMessage());
        return false;
    }
}

}
