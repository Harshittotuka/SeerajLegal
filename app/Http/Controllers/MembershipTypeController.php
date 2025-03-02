<?php

namespace App\Http\Controllers;

use App\Services\MembershipTypeService;
use Illuminate\Http\JsonResponse;

class MembershipTypeController extends Controller
{
    protected $membershipTypeService;

    public function __construct(MembershipTypeService $membershipTypeService)
    {
        $this->membershipTypeService = $membershipTypeService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->membershipTypeService->getAllMembershipTypes(), 200);
    }
}
