<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function getAllContacts()
    {
        return Contact::all();
    }
    public function createContact(array $data)
    {
        return Contact::create($data);
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return true;
        }
        return false;
    }
    public function updateContact($id, array $data)
{
    $contact = Contact::find($id);
    if (!$contact) {
        return null; // Explicitly return null if no contact is found
    }

    $contact->update($data);
    return $contact;
}
}
