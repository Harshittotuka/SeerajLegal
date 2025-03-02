<?php
namespace App\Services;

use App\Repositories\TeamRepository;

class TeamService
{
    protected $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function getAllTeams()
    {
        return $this->teamRepository->getAllTeams();
    }

    public function getTeamById($id)
    {
        return $this->teamRepository->getTeamById($id);
    }

    public function getTeamsByAreaOfPractice($practice)
    {
        return $this->teamRepository->getTeamsByAreaOfPractice($practice);
    }

    public function getTeamsByADRService($service)
    {
        return $this->teamRepository->getTeamsByADRService($service);
    }
}
