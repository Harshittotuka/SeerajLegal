<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;
use Illuminate\Validation\ValidationException;
use Exception;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getAllContacts()
    {
        try {
            $contacts = $this->contactService->getAllContacts();
            return response()->json(['success' => true, 'data' => $contacts], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to fetch contacts', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'nullable|email|unique:contacts',
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

            $contact = $this->contactService->createContact($validatedData);
            return response()->json(['success' => true, 'message' => 'Contact created successfully', 'data' => $contact], 201);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'error' => 'Validation failed', 'message' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to create contact', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
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

            $updatedContact = $this->contactService->updateContact($id, $validatedData);

            if (!$updatedContact) {
                return response()->json(['success' => false, 'error' => 'Contact not found'], 404);
            }

            return response()->json(['success' => true, 'message' => 'Contact updated successfully', 'data' => $updatedContact], 200);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'error' => 'Validation failed', 'message' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to update contact', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->contactService->deleteContact($id);

            if (!$deleted) {
                return response()->json(['success' => false, 'error' => 'Contact not found'], 404);
            }

            return response()->json(['success' => true, 'message' => 'Contact deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to delete contact', 'message' => $e->getMessage()], 500);
        }
    }
}
