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
        // Function to fetch articles using AboutService
        public function getWhoWeAre()
        {
            $articles = $this->aboutService->getWhoWeAre();
            return response()->json($articles);
        }
    
}
