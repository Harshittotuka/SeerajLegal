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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:contacts',
            'address' => 'required|string',
            'phone_no' => 'required|string',
            'phone_2' => 'nullable|string',
            'yrs_of_experience' => 'nullable|integer|min:0',
            'insta_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        $contact = $this->contactService->createContact($validatedData);

        return response()->json(['message' => 'Contact created successfully', 'data' => $contact], 201);
    }

    public function destroy($id)
    {
        $deleted = $this->contactService->deleteContact($id);

        if ($deleted) {
            return response()->json(['message' => 'Contact deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }
    public function update(Request $request, $id)
{
    // Validate request data
    $validatedData = $request->validate([
        'email' => 'nullable|email|unique:contacts,email,' . $id,
        'address' => 'nullable|string',
        'phone_no' => 'nullable|string',
        'phone_2' => 'nullable|string',
        'yrs_of_experience' => 'nullable|integer|min:0',
        'insta_link' => 'nullable|url',
        'facebook_link' => 'nullable|url',
        'youtube_link' => 'nullable|url',
        'twitter_link' => 'nullable|url',
        'whatsapp' => 'nullable|string',
        'linkedin' => 'nullable|url',
        'website_link' => 'nullable|url',
    ]);

    try {
        // Call service to update contact
        $updatedContact = $this->contactService->updateContact($id, $validatedData);

        // Handle case where contact is not found
        if (!$updatedContact) {
            return response()->json([
                'message' => 'Contact not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Contact updated successfully',
            'data' => $updatedContact
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Failed to update contact',
            'message' => $e->getMessage()
        ], 500);
    }
}

}
