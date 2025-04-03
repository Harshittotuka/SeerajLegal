<?php
namespace App\Services;
use App\Models\Practice;

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
    public function createPractices(array $data)
    {
        // Check if a practice with the same name already exists
        $existingPractice = Practice::where('practice_name', $data['practice_name'])->exists();
        if ($existingPractice) {
            return [
                'success' => false,
                'message' => "A practice with the name '{$data['practice_name']}' already exists.",
                'data' => [], // Include an empty data key
            ];
        }

        $createdPractices = [];

        foreach ($data['paragraphs'] as $paragraph) {
            $createdPractice = $this->practiceRepository->create([
                'practice_name' => $data['practice_name'], // Corrected to use provided practice name
                'para_sno' => $paragraph['para_sno'],
                'title' => $paragraph['title'],
                'para' => $paragraph['para'],
                'points' => $paragraph['points'] ?? [], // Ensure points are stored properly
                'what_we_provide' => $data['what_we_provide'] ?? [], // Store as JSON
                'flag' => $data['flag'] ?? 'enabled',
                'icon' => $data['icon'],
                'image_path' => $data['image_path'],
                'top_image' => $data['top_image'],
            ]);

            $createdPractices[] = $createdPractice;
        }

        return [
            'success' => true,
            'message' => 'Practices created successfully.',
            'data' => $createdPractices,
        ];
    }

    public function updatePractice($practiceName, $data)
    {
        // Check if the new practice name already exists (excluding the current practice)
        $existingPractice = Practice::where('practice_name', $data['practice_name'])->where('practice_name', '!=', $practiceName)->exists();

        if ($existingPractice) {
            return [
                'success' => false,
                'message' => "A practice with the name '{$data['practice_name']}' already exists.",
                'data' => [], // Include an empty data key
            ];
        }

        // Check if the practice to be updated exists
        $existingPractice = Practice::where('practice_name', $practiceName)->exists();

        if (!$existingPractice) {
            return [
                'success' => false,
                'message' => 'Practice does not exist.',
                'data' => [], // Include an empty data key
            ];
        }

        // Delete existing records for the practice
        $this->practiceRepository->deleteByPracticeName($practiceName);

        $updatedPractices = [];

        foreach ($data['paragraphs'] as $paragraph) {
            $updatedPractice = $this->practiceRepository->create([
                'practice_name' => $data['practice_name'], // Corrected to use provided practice name
                'para_sno' => $paragraph['para_sno'],
                'title' => $paragraph['title'],
                'para' => $paragraph['para'],
                'points' => $paragraph['points'] ?? null,
                'what_we_provide' => $data['what_we_provide'] ?? null,
                'flag' => $data['flag'] ?? 'enabled',
                'icon' => $data['icon'],
                'image_path' => $data['image_path'],
                'top_image' => $data['top_image'],
            ]);

            $updatedPractices[] = $updatedPractice;
        }

        return [
            'success' => true,
            'message' => 'Practice updated successfully.',
            'data' => $updatedPractices,
        ];
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
