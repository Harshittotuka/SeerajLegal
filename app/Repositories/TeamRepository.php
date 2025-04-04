<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
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

    public function countTeamMembersByService(array $services): array
    {
        $result = [];

        foreach ($services as $service) {
            $count = Team::where('adr_services', 'like', "%$service%")->count(); // Adjust if your column is JSON
            $result[$service] = $count;
        }
        
        return $result;
    }
    public function countByPractice()
    {
        $records = DB::table('teams')->pluck('area_of_practice');

        $practiceCounts = [];

        foreach ($records as $practiceField) {
            // Attempt to decode as JSON
            $practices = json_decode($practiceField, true);

            if (is_array($practices)) {
                foreach ($practices as $practice) {
                    if (!empty($practice)) {
                        $practiceCounts[$practice] = ($practiceCounts[$practice] ?? 0) + 1;
                    }
                }
            } elseif (!empty($practiceField)) {
                // If not JSON, treat as single string
                $practiceCounts[$practiceField] = ($practiceCounts[$practiceField] ?? 0) + 1;
            }
        }

        return $practiceCounts;
    }
}
