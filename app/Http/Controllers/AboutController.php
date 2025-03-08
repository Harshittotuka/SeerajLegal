<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AboutService;

class AboutController extends Controller
{
    protected $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    // Function to fetch FAQs using AboutService
    public function getFaqs()
    {
        $faqs = $this->aboutService->getFaqs();
        return response()->json($faqs);
    }

    // Function to fetch AboutUs using AboutService
    public function getWhoWeAre(Request $request)
    {
        $S_ids = $request->input('S_id');

        if (!is_array($S_ids) || empty($S_ids)) {
            return response()->json(['error' => 'Invalid or missing S_id'], 400);
        }

        $data = $this->aboutService->getWhoWeAre($S_ids);
        
        return response()->json($data);
    }

    // Update FAQ by Sno
    public function updateFaq(Request $request, $Sno)
{
    $request->validate([
        'Question' => 'required|string',
        'Answer' => 'required|string',
    ]);

    $result = $this->aboutService->updateFaq($Sno, $request->all());

    if (isset($result['error'])) {
        return response()->json([
            'success' => false,
            'error' => $result['error']
        ], 400);
    }

    return response()->json([
        'success' => true,
        'message' => 'FAQ updated successfully',
        'data' => $result
    ], 200);
}
//delete faq by Sno
public function deleteFaq($Sno)
{
    $result = $this->aboutService->deleteFaq($Sno);

    if (isset($result['error'])) {
        return response()->json([
            'success' => false,
            'error' => $result['error']
        ], 400);
    }

    return response()->json([
        'success' => true,
        'message' => 'FAQ deleted successfully'
    ], 200);
}

}
