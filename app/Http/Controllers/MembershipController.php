<?php

namespace App\Http\Controllers;

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
}
