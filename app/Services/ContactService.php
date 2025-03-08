<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts()
    {
        return $this->contactRepository->getAllContacts();
    }
    public function createContact(array $data)
    {
        return $this->contactRepository->createContact($data);
    }

    public function deleteContact($id)
    {
        return $this->contactRepository->deleteContact($id);
    }
    public function updateContact($id, array $data)
{
    return $this->contactRepository->updateContact($id, $data);
}
}
