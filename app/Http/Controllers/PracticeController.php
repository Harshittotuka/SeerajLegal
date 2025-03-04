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
        $data = $request->validate([
            'practice_name' => 'required|string',
            'para_sno' => 'required|integer',
            'title' => 'required|string',
            'para' => 'required|string',
            'points' => 'nullable|array',
            'what_we_provide' => 'nullable|array',
        ]);

        return response()->json($this->practiceService->createPractice($data));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'practice_name' => 'required|string',
            'para_sno' => 'required|integer',
            'title' => 'required|string',
            'para' => 'required|string',
            'points' => 'nullable|array',
            'what_we_provide' => 'nullable|array',
        ]);

        return response()->json($this->practiceService->updatePractice($id, $data));
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
