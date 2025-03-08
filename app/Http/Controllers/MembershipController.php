<?php

namespace App\Http\Controllers;
use app\Repositories\MembershipRepository;
use Illuminate\Http\Request;
use App\Services\MembershipService;

class MembershipController extends Controller
{
    protected $membershipService;

    public function __construct(MembershipService $membershipService)
    {
        $this->membershipService = $membershipService;
    }

    public function getAllMembers()
    {
        $members = $this->membershipService->getAllMembers();
        return response()->json($members, 200);
    }
    // Create Member
    public function createMember(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'membership_type' => 'required|string',
        ]);

        $member = $this->membershipService->createMember($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Member created successfully!',
            'data' => $member
        ], 201);
    }

    // Delete Member
    public function deleteMember($id)
    {
        $deleted = $this->membershipService->deleteMember($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Member not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Member deleted successfully!'
        ], 200);
 
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'membership_type' => 'required|string',
        ]);

        $updatedMember = $this->membershipService->updateMember($id, $request->all());

        if (!$updatedMember) {
            return response()->json(['success' => false, 'message' => 'Member not found'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Member updated successfully', 'data' => $updatedMember]);
    }
}
