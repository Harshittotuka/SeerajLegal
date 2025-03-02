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
}
