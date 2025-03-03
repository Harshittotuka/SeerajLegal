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
        return Practice::distinct()->pluck('practice_name'); // Fetch unique practice names
    }

    //insert,update,delete
    public function create(array $data)
    {
        return Practice::create($data);
    }

    public function update($id, array $data)
    {
        $practice = Practice::findOrFail($id);
        $practice->update($data);
        return $practice;
    }

    public function delete($id)
    {
        return Practice::destroy($id);
    }
}
