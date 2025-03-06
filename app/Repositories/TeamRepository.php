<?php
namespace App\Repositories;

use App\Models\Team;

class TeamRepository
{
    public function getAllTeams()
    {
        return Team::all(); // Fetch all teams
    }

    public function getTeamById($id)
    {
        return Team::find($id); // Fetch a single team by ID
    }

    public function getTeamsByAreaOfPractice($practice)
    {
        return Team::whereJsonContains('area_of_practice', $practice)->get();
    }

    public function getTeamsByADRService($service)
    {
        return Team::whereJsonContains('adr_services', $service)->get();
    }
    public function create(array $data)
    {
        return Team::create($data);
    }
   
    public function deleteById($id)
    {
        return Team::destroy($id);
    }

    public function findById($id)
    {
        return Team::find($id);
    }
}
