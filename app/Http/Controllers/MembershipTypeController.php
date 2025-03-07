<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        return response()->json([
            'success' => true,
            'data' => $this->membershipTypeService->getAllMembershipTypes()
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|string',
            'priority' => 'required|integer',
        ]);

        $result = $this->membershipTypeService->createMembershipType($request->all());
        if (isset($result['error'])) {
            return response()->json([
                'success' => false,
                'error' => $result['error']
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $result
        ], 201);
    }

    public function update(Request $request, $membershipType)
    {
        $request->validate([
            'membership_type' => 'required|string',
            'priority' => 'required|integer',
        ]);

        $result = $this->membershipTypeService->updateMembershipType($membershipType, $request->all());
        if (isset($result['error'])) {
            return response()->json([
                'success' => false,
                'error' => $result['error']
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $result
        ], 200);
    }

    public function delete($membershipType)
    {
        $result = $this->membershipTypeService->deleteMembershipType($membershipType);
        if (isset($result['error'])) {
            return response()->json([
                'success' => false,
                'error' => $result['error']
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => $result['success']
        ], 200);
    }
}


