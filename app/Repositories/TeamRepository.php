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

    // BY CHIRAYU
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

    public function filterTeams(array $adrServices, array $areaOfPractice)
    {
        return Team::where(function ($query) use ($adrServices, $areaOfPractice) {
            if (!empty($adrServices)) {
                $query->whereJsonContains('adr_services', $adrServices);
            }
            if (!empty($areaOfPractice)) {
                $query->whereJsonContains('area_of_practice', $areaOfPractice);
            }
        })->get();
    }

    public function update($id, array $data)
    {
        $team = $this->findById($id);
        if (!$team) {
            return null;
        }

        $team->update($data);
        return $team;
    }
}
