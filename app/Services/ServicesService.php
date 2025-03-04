<?php
namespace App\Services;

use App\Repositories\ServiceRepository;

class ServicesService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
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
        return $this->serviceRepository->create($data);
}
}
