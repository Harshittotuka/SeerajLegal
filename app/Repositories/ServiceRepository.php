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
    public function getServiceRuleByName($service_name)
    {
        return Service::select('id', 'service_name', 'rules', 'flag')
                      ->where('service_name', $service_name)
                      ->first();
    }
    public function getPracticeNames()
    {
        return Practice::where('para_sno', 1) // Filter records where para_sno = 1
        ->select('id', 'practice_name', 'flag') // Select required columns
        ->groupBy('practice_name', 'id', 'flag') // Group by practice_name to get unique ones
        ->orderBy('id') // Order by ID to get the first inserted record
        ->get();
    }
    public function fetchUniqueServiceNames()
    {
        return Service::where('para_sno', 1) // Filter records where para_sno = 1
        ->select('id', 'service_name','icon', 'flag') // Select required columns
        ->groupBy('service_name','icon', 'id', 'flag') // Group by practice_name to get unique ones
        ->orderBy('id') // Order by ID to get the first inserted record
        ->get();
    }

    public function create(array $data)
    {
       
        return Service::create($data);
    }

    //toggle api
    public function toggleFlag($serviceName)
    {
        $currentFlag = Service::where('service_name', $serviceName)->first()->flag;
        $newFlag = $currentFlag === 'enabled' ? 'disabled' : 'enabled';
        return Service::where('service_name', $serviceName)->first()->update(['flag' => $newFlag]);
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
