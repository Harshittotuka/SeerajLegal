<?php
namespace App\Services;

use App\Repositories\ServiceRepository;

use App\Models\Service;

class ServicesService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    //get rules for services by name
    public function getServiceRuleByName($service_name)
    {
        return $this->serviceRepository->getServiceRuleByName($service_name);
    }
    /**
     * Get all services.
     */
    public function getAllServices()
    {
        return $this->serviceRepository->getAllServices();
    }

    /**
     * Get a specific service by name.
     */
    public function getServiceByName($name)
    {
        return $this->serviceRepository->getServiceByName($name);
    }

    public function getUniqueServiceNames()
    {
        return $this->serviceRepository->fetchUniqueServiceNames();
    }

    public function createService(array $data)
    {
        $createdServices = []; // Initialize an array to store created services
    
        // Check if paragraphs exist to prevent undefined array key error
        if (!isset($data['paragraphs']) || !is_array($data['paragraphs'])) {
            throw new \Exception("Invalid paragraphs data");
        }
    
        foreach ($data['paragraphs'] as $paragraph) {
            $service = $this->serviceRepository->create([
                'service_name' => $data['service_name'],  // Ensure this column exists in DB
                'para_sno' => $paragraph['para_sno'] ?? null,
                'title' => $paragraph['title'] ?? null,
                'para' => $paragraph['para'] ?? null,
                'points' => $paragraph['points'] ?? [],
                'icon' => $data['icon'] ,
                'top_image' => $data['top_image']
            ]);
    
            // Store the created service in the array
            $createdServices[] = $service;
        }
    
        return [
            'success' => true,
            'message' => 'Practices created successfully',
            'data' => $createdServices
        ];
    }
    

    //toggle service
    public function toggleServiceFlag($serviceName)
    {
        return $this->serviceRepository->toggleFlag($serviceName);

}
public function deleteServiceByName($name): bool
    {
        return $this->serviceRepository->deleteByName($name);
    }


    public function updateService($ServiceName, $data)
    {
        // Check if service exists
        $existingService = Service::where('service_name', $ServiceName)->exists();
    
        if (!$existingService) {
            return ['success' => false, 'message' => 'Practice does not exist'];
        }
    
        // Delete existing records
        $this->serviceRepository->deleteByName($ServiceName);
    
        $createdServices = [];
    
        foreach ($data['paragraphs'] as $paragraph) {
            $createdService = $this->serviceRepository->create([
                'service_name' => $data['service_name'], // Ensure consistency
                'para_sno' => $paragraph['para_sno'],
                'title' => $paragraph['title'],
                'para' => $paragraph['para'],
                'points' => $paragraph['points'] ?? [],
                'icon' => $data['icon'] , // Ensure proper JSON encoding
                'top_image' => $data['top_image'] // Ensure proper JSON encoding
            ]);
    
            $createdServices[] = $createdService;
        }
    
        return [
            'success' => true,
            'message' => 'Practice updated successfully',
            'data' => $createdServices
        ];
    }
    
}
