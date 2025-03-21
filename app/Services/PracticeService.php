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
    $createdPractices = [];
  
    foreach ($data['paragraphs'] as $paragraph) {
        $createdPractice = $this->practiceRepository->create([
            'practice_name' => $data['practice_name'],  // Corrected to use provided practice name
            'para_sno' => $paragraph['para_sno'],
            'title' => $paragraph['title'],
            'para' => $paragraph['para'],
            'points' => $paragraph['points'] ?? [], // Ensure points are stored properly
            'what_we_provide' => $data['what_we_provide'] ?? [], // Store as JSON
            'flag' => $data['flag'] ?? 'enabled',
            'icon' => $data['icon'] ,
            "image_path" => $data['image_path']
        ]);

        $createdPractices[] = $createdPractice;
    }

    return [
        'success' => true,
        'message' => 'Practices created successfully',
        'data' => $createdPractices
    ];
}


    public function updatePractice($practiceName, $data)
    {
        $existingPractice = Practice::where('practice_name', $practiceName)->exists();

        if (!$existingPractice) {
            return ['success' => false, 'message' => 'Practice does not exist'];
        }

        $this->practiceRepository->deleteByPracticeName($practiceName);

        foreach ($data['paragraphs'] as $paragraph) {
            $this->practiceRepository->create([
                'practice_name' => $data['practice_name'],  // Corrected to use provided practice name
                'para_sno' => $paragraph['para_sno'],
                'title' => $paragraph['title'],
                'para' => $paragraph['para'],
                'points' => $paragraph['points'] ?? null,
                'what_we_provide' => $data['what_we_provide'] ?? null,
                'flag' => $data['flag'] ?? 'enabled',
                'icon' => $data['icon'] ,
                "image_path" => $data['image_path']
            ]);
        }

        return ['success' => true, 'message' => 'Practice updated successfully'];
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
