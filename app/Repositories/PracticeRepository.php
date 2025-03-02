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
}
