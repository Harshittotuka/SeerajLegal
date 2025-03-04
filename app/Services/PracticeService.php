<?php
namespace App\Services;

use App\Repositories\PracticeRepository;

class PracticeService
{
    protected $practiceRepository;

    public function __construct(PracticeRepository $practiceRepository)
    {
        $this->practiceRepository = $practiceRepository;
    }

    // Get all practices
    public function getAllPractices()
    {
        return $this->practiceRepository->getAllPractices();
    }

    // Get a practice by name
    public function getPracticeByName($name)
    {
        return $this->practiceRepository->getPracticeByName($name);
    }
    public function getPracticeNames()
    {
        return $this->practiceRepository->getPracticeNames();
    }

    //insert,update,delete
    public function createPractice(array $data)
    {
        return $this->practiceRepository->create($data);
    }

    public function updatePractice($id, array $data)
    {
        return $this->practiceRepository->update($id, $data);
    }

    public function deletePractice($id)
    {
        return $this->practiceRepository->delete($id);
    }
    //toggle practice
    public function togglePracticeFlag($practiceName)
    {
        return $this->practiceRepository->toggleFlag($practiceName);
    }
}
