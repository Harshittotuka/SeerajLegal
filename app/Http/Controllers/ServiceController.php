<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    protected $servicesService;

    public function __construct(ServicesService $servicesService)
    {
        $this->servicesService = $servicesService;
    }

    /**
     * Fetch all services.
     */
    public function index(): JsonResponse
    {
        $services = $this->servicesService->getAllServices();
        return response()->json(['success' => true, 'data' => $services], 200);
    }

    /**
     * Fetch a specific service by name, or return all services if not found.
     */
    public function show($name): JsonResponse
{
    $services = $this->servicesService->getServiceByName($name);

    if ($services->isNotEmpty()) { // Check if there are matching services
        return response()->json(['success' => true, 'data' => $services], 200);
    } else {
        return response()->json(['success' => false, 'message' => 'Service not found'], 404);
    }
}


public function getServiceNames(): JsonResponse
{
    $serviceNames = $this->servicesService->getUniqueServiceNames();
    return response()->json(['success' => true, 'data' => $serviceNames]);
}

}
