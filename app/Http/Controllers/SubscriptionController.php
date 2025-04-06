<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $service;

    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'mail' => 'required|email',
        ]);

        $this->service->subscribe($request->mail);

        // No response needed for silent operation
        return response()->json(['success' => true]);
    }
}
