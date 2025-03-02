<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomepageService;

class HomepageController extends Controller
{
    protected $HomepageService;

    public function __construct(HomepageService $HomepageService)
    {
        $this->HomepageService = $HomepageService;
    }

    // Function to fetch all homepage data
    public function getAllData()
    {
        return response()->json($this->HomepageService->getAllData());
    }
}
