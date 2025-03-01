<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FaqService;

class FaqController extends Controller
{
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        $faqs = $this->faqService->getAllFaqs();
        return response()->json($faqs);
    }
}
