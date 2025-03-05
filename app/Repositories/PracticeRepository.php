<?php
namespace App\Repositories;

use App\Models\Practice;

class PracticeRepository
{
    // Fetch all practices
    public function getAllPractices()
    {
        return Practice::all();
    }

    // Fetch a practice by name
    public function getPracticeByName($name)
    {
        return Practice::where('practice_name', $name)->get();
    }
    public function getPracticeNames()
    {
        return Practice::where('para_sno', 1) // Filter records where para_sno = 1
        ->select('id', 'practice_name', 'flag') // Select required columns
        ->groupBy('practice_name', 'id', 'flag') // Group by practice_name to get unique ones
        ->orderBy('id') // Order by ID to get the first inserted record
        ->get();
    }

    //insert,update,delete
    public function create(array $data)
    {
        return Practice::create($data);
    }
    //update temporary code
    public function deleteByPracticeName($practiceName)
    {
        Practice::where('practice_name', $practiceName)->delete();
    }


    public function delete($id)
    {
        return Practice::destroy($id);
    }
    //toggle api
    public function toggleFlag($practiceName)
    {
        $currentFlag = Practice::where('practice_name', $practiceName)->first()->flag;
        $newFlag = $currentFlag === 'enabled' ? 'disabled' : 'enabled';
        return Practice::where('practice_name', $practiceName)->first()->update(['flag' => $newFlag]);
    }
}
