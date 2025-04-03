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
        // Check if a service with the same name already exists
        $existingService = Service::where('service_name', $data['service_name'])->exists();
        if ($existingService) {
            return [
                'success' => false,
                'message' => "A service with the name '{$data['service_name']}' already exists.",
                'data' => [], // Include an empty data key
            ];
        }

        $createdServices = []; // Initialize an array to store created services

        // Check if paragraphs exist to prevent undefined array key error
        if (!isset($data['paragraphs']) || !is_array($data['paragraphs'])) {
            return [
                'success' => false,
                'message' => 'Invalid paragraphs data.',
                'data' => [], // Include an empty data key
            ];
        }

        foreach ($data['paragraphs'] as $paragraph) {
            $service = $this->serviceRepository->create([
                'service_name' => $data['service_name'], // Ensure this column exists in DB
                'para_sno' => $paragraph['para_sno'] ?? null,
                'title' => $paragraph['title'] ?? null,
                'para' => $paragraph['para'] ?? null,
                'points' => $paragraph['points'] ?? [],
                'icon' => $data['icon'],
                'top_image' => $data['top_image'],
            ]);

            // Store the created service in the array
            $createdServices[] = $service;
        }

        return [
            'success' => true,
            'message' => 'Service created successfully.',
            'data' => $createdServices,
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
        // Check if the new service name already exists (excluding the current service)
        $existingService = Service::where('service_name', $data['service_name'])->where('service_name', '!=', $ServiceName)->exists();

        if ($existingService) {
            return [
                'success' => false,
                'message' => "A service with the name '{$data['service_name']}' already exists.",
                'data' => [], // Include an empty data key
            ];
        }

        // Check if the service to be updated exists
        $existingService = Service::where('service_name', $ServiceName)->exists();

        if (!$existingService) {
            return [
                'success' => false,
                'message' => 'Service does not exist.',
                'data' => [], // Include an empty data key
            ];
        }

        // Delete existing records for the service
        $this->serviceRepository->deleteByName($ServiceName);

        $createdServices = [];

        foreach ($data['paragraphs'] as $paragraph) {
            $createdService = $this->serviceRepository->create([
                'service_name' => $data['service_name'], // Ensure consistency
                'para_sno' => $paragraph['para_sno'] ?? null,
                'title' => $paragraph['title'] ?? null,
                'para' => $paragraph['para'] ?? null,
                'points' => $paragraph['points'] ?? [],
                'icon' => $data['icon'],
                'top_image' => $data['top_image'],
            ]);

            $createdServices[] = $createdService;
        }

        return [
            'success' => true,
            'message' => 'Service updated successfully.',
            'data' => $createdServices,
        ];
    }
}
