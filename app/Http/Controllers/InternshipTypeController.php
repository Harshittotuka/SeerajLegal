<?php

namespace App\Http\Controllers;

use App\Models\InternshipType;
use Illuminate\Http\Request;

class InternshipTypeController extends Controller
{

    public function index()
{
    $internshipTypes = InternshipType::orderBy('priority', 'asc')->get();

    return response()->json([
        'success' => true,
        'data' => $internshipTypes,
    ]);
}
    // Create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|unique:internship_types,type',
            'priority' => 'nullable|integer|unique:internship_types,priority',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $internshipType = InternshipType::create($validated);

        return response()->json([
            'success' => true,
            'data' => $internshipType,
        ], 201);
    }

    // Show
    public function show($id)
    {
        $internshipType = InternshipType::find($id);

        if (!$internshipType) {
            return response()->json([
                'success' => false,
                'message' => 'Internship type not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $internshipType,
        ]);
    }

    // Update
    public function update(Request $request, $id)
    {
        $internshipType = InternshipType::find($id);

        if (!$internshipType) {
            return response()->json([
                'success' => false,
                'message' => 'Internship type not found',
            ], 404);
        }

        $validated = $request->validate([
            'type' => 'sometimes|string|unique:internship_types,type,' . $id,
            'priority' => 'sometimes|integer|unique:internship_types,priority,' . $id,
            'price' => 'sometimes|numeric',
            'description' => 'nullable|string',
        ]);

        $internshipType->update($validated);

        return response()->json([
            'success' => true,
            'data' => $internshipType,
        ]);
    }

    // Delete
    public function destroy($id)
    {
        $internshipType = InternshipType::find($id);

        if (!$internshipType) {
            return response()->json([
                'success' => false,
                'message' => 'Internship type not found',
            ], 404);
        }

        $internshipType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully',
        ]);
    }
}
