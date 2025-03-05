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
public function updateService($serviceName, $newData)
{
    $existingService = Service::where('service_name', $serviceName)->exists();

    if (!$existingService) {
        return ['success' => false, 'message' => 'No such service exists'];
    }

    // Remove existing records for the service
    Service::where('service_name', $serviceName)->delete();

    // Insert new records
    foreach ($newData as $data) {
        Service::create([
            'service_name' => $serviceName,
            'para_sno' => $data['para_sno'] ?? null,
            'title' => $data['title'] ?? null,
            'para' => $data['para'] ?? null,
            'points' => isset($data['points']) ? json_encode($data['points']) : null,
            'rules' => $data['rules'] ?? null,
            'flag' => $data['flag'] ?? 'null',
        ]);
    }

    return ['success' => true];
}
public function checkIfServiceExists($serviceName)
{
    return Service::where('service_name', $serviceName)->exists();
}



}
