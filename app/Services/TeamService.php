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
    public function updateTeam($id, array $data)
    {
        $team = $this->teamRepository->findById($id);

        if (!$team) {
            return ['success' => false, 'message' => 'Team member not found'];
        }

        $updatedTeam = $this->teamRepository->update($id, $data);

        return ['success' => true, 'message' => 'Team member updated successfully', 'data' => $updatedTeam];
    }
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'nullable|string|max:255',
                'area_of_practice' => 'nullable|array',
                'adr_services' => 'nullable|array',
                'all_rounder' => 'boolean',
                'type' => 'nullable|string|max:255',
            ]);

            $response = $this->teamService->updateTeam($id, $validatedData);

            return response()->json($response, $response['success'] ? 200 : 404);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
