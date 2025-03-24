<?php
namespace App\Http\Controllers;

use App\Services\PracticeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Practice; 

class PracticeController extends Controller
{
    protected $practiceService;

    public function __construct(PracticeService $practiceService)
    {
        $this->practiceService = $practiceService;
    }

    //toggle api code
    public function toggleFlag($practiceName)
    {
        // Check if practice name is provided
        if (!$practiceName) {
            return response()->json(['success' => false, 'message' => 'Practice name is required'], 400);
        }
    
        // Attempt to toggle the practice flag
        $success = $this->practiceService->togglePracticeFlag($practiceName);
    
        // Return JSON response with success status
        if ($success) {
            return response()->json(['success' => true, 'message' => 'Practice flag updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update practice flag'], 500);
        }
    }
    

    // Fetch all practices
    public function index()
    {
        $practices = $this->practiceService->getAllPractices();
        
        return response()->json([
            'success' => true,
            'data' => $practices
        ]);
    }

    // Fetch a practice by name
    public function search(Request $request)
    {
        $name = $request->query('name'); // Get the practice name from the query parameter

        if (!$name) {
            return response()->json([
                'success' => false,
                'message' => 'Practice name is required'
            ], 400);
        }

        $practice = $this->practiceService->getPracticeByName($name);

        if (!$practice) {
            return response()->json([
                'success' => false,
                'message' => 'Practice not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $practice
        ]);
    }

    public function getPracticeNames(): JsonResponse
    {
        $practiceNames = $this->practiceService->getPracticeNames();
        return response()->json(['success' => true, 'data' => $practiceNames]);
    }
    //insert,update,delete
    public function store(Request $request)
    {
        try {
            // Validate the request
            $data = $request->validate([
                'practice_name' => 'required|string',
                'paragraphs' => 'nullable|array',
                'paragraphs.*.para_sno' => 'nullable|integer',
                'paragraphs.*.title' => 'nullable|string',
                'paragraphs.*.para' => 'nullable|string',
                'paragraphs.*.points' => 'nullable|array',
                'what_we_provide' => 'nullable|array',
                'flag' => 'string',
                'image_path' => 'nullable|string',
                'top_image' => 'nullable|string',
                'icon' => 'nullable|string'
            ]);
    
            // Create practices using the service
            $practice = $this->practiceService->createPractices($data);
    
            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Practices created successfully',
                'data' => $practice
            ], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    


public function update(Request $request, $practiceName)
    {
        $validated = $request->validate([
            'practice_name' => 'required|string',
            'paragraphs' => 'nullable|array',
            'paragraphs.*.para_sno' => 'nullable|integer',
            'paragraphs.*.title' => 'nullable|string',
            'paragraphs.*.para' => 'nullable|string',
            'paragraphs.*.points' => 'nullable|array',
            'what_we_provide' => 'nullable|array',
            'flag' => 'nullable|in:enabled,disabled',
            'icon' => 'nullable|string',
            'image_path' => 'nullable|string',
            'top_image' => 'nullable|string'
        ]);

        $result = $this->practiceService->updatePractice($practiceName, $validated);

        if (!$result['success']) {
            return response()->json(['success' => false, 'message' => $result['message']], 404);
        }

        return response()->json(['success' => true, 'message' => 'Practice updated successfully']);
    }

    public function destroy($practice_name)
    {
        
        $deletedRows = Practice::where('practice_name', $practice_name)->delete();
        
        if ($deletedRows > 0) {
            return response()->json([
                'success' => true,  // ✅ Success flag
                'message' => "$deletedRows practice(s) deleted successfully!"
            ]);
        } else {
            return response()->json([
                'success' => false,  // ❌ Failure flag
                'message' => "No practices found with name: $practice_name"
            ], 404);
        }
        
    }
}
