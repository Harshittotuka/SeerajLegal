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
    public function createTeam(array $data)
    {
        return $this->teamRepository->create($data);
    }
    public function deleteTeam($id)
    {
        $team = $this->teamRepository->findById($id);

        if (!$team) {
            return ['success' => false, 'message' => 'Team member not found'];
        }

        $deleted = $this->teamRepository->deleteById($id);

        return $deleted
            ? ['success' => true, 'message' => 'Team member deleted successfully']
            : ['success' => false, 'message' => 'Failed to delete team member'];
    }
}
