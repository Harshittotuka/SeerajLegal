<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin not found.'], 404);
        }

        if (!Hash::check($request->old_password, $admin->password)) {
            return response()->json(['success' => false, 'message' => 'Old password is incorrect.'], 400);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return response()->json(['success' => true, 'message' => 'Password updated successfully.']);
    }

    public function index()
    {
        $admins = Admin::all(); // Fetch all admins from the database
        return response()->json($admins, 200); // Return admins as a JSON response
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:admins,email',
            'password' => 'required|string',
            'phone' => 'nullable|string|max:15|unique:admins,phone',
            'profile_image' => 'nullable|string',
            'type' => 'required|in:Admin,Superadmin',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $admin = $this->adminService->createAdmin($request->all());
        return response()->json(['success' => true, 'admin' => $admin], 201);
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => "required|unique:admins,email,$id",
            'password' => 'nullable|string',
            'phone' => "nullable|string|max:15|unique:admins,phone,$id",
            'profile_image' => 'nullable|string',
            'type' => 'required|in:Admin,Superadmin',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $admin = $this->adminService->editAdmin($id, $request->all());
        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Failed to update admin.'], 400);
        }

        return response()->json(['success' => true, 'admin' => $admin], 200);
    }

    public function delete($id)
    {
        $adminDeleted = $this->adminService->deleteAdmin($id);

        if (!$adminDeleted) {
            return response()->json(['success' => false, 'message' => 'Admin not found'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Admin deleted successfully'], 200);
    }

    //NEED TO BE UPDATED
    public function updatePasswordDirect(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|string',
        ]);

        // Find user by ID
        $user = Admin::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Password updated successfully']);
    }
}
