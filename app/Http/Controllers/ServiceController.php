<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(): JsonResponse
    {
        $services = $this->serviceRepository->getAllServices();
        return response()->json(['success' => true, 'data' => $services], 200);
    }
}
