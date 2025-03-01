<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getAllContacts()
    {
        $contacts = $this->contactService->getAllContacts();
        return response()->json($contacts, 200);
    }
}
