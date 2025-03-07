<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $servicesService;

    public function __construct(ServicesService $servicesService)
    {
        $this->servicesService = $servicesService;
    }
//toggle api code
public function toggleFlag($serviceName)
{
    if (!$serviceName) {
        return response()->json(['message' => 'Service name is required'], 400);
    }

    $success = $this->servicesService->toggleServiceFlag($serviceName);
   
    
    // Return JSON response with success status
    if ($success) {
        return response()->json(['success' => true, 'message' => 'Practice flag updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to update practice flag'], 500);
    }
}


    /**
     * Fetch all services.
     */
    public function index(): JsonResponse
    {
        $services = $this->servicesService->getAllServices();
        return response()->json(['success' => true, 'data' => $services], 200);
    }


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



public function store(Request $request): JsonResponse
{


    $data = $request->validate([
        'service_name' => 'required|string',
        'paragraphs' => 'nullable|array',
        'paragraphs.*.para_sno' => 'nullable|integer',
        'paragraphs.*.title' => 'nullable|string',
        'paragraphs.*.para' => 'nullable|string',
        'paragraphs.*.points' => 'nullable|array',
    ]);

    $service = $this->servicesService->createService($data);

    return response()->json([
        'success' => true,
        'message' => 'Services created successfully',
        'data' => $service['data'], // ✅ Extracting only the `data` array to avoid nested responses
    ], 201);
}
public function deleteByName($name): JsonResponse
{
    $deleted = $this->servicesService->deleteServiceByName($name);

    if ($deleted) {
        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully'
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Service not found'
        ], 404);
    }
}

public function update(Request $request, $ServiceName)
{
    $validated = $request->validate([
        'service_name' => 'required|string',
        'paragraphs' => 'nullable|array',
        'paragraphs.*.para_sno' => 'nullable|integer',
        'paragraphs.*.title' => 'nullable|string',
        'paragraphs.*.para' => 'nullable|string',
        'paragraphs.*.points' => 'nullable|array',
        'flag' => 'nullable|string'
    ]);

    // Call the service to update records
    $result = $this->servicesService->updateService($ServiceName, $validated);

    if (!$result['success']) {
        return response()->json(['success' => false, 'message' => $result['message']], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Practice updated successfully',
        'data' => $result['data'] // Ensure the updated data is returned
    ]);
}


}
