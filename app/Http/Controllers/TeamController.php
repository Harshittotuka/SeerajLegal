<?php

namespace App\Http\Controllers;
use App\Models\Team;

use Illuminate\Http\Request;
use App\Services\TeamService;
use Illuminate\Validation\ValidationException;


class TeamController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        return response()->json($this->teamService->getAllTeams());
    }

    public function show($id)
    {
        $team = $this->teamService->getTeamById($id);

        if ($team) {
            return response()->json([
                'success' => true,
                'data' => $team,
            ]);
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Team not found',
                ],
                404,
            );
        }
    }

    public function filterByPractice($practice)
    {
        return response()->json($this->teamService->getTeamsByAreaOfPractice($practice));
    }

    public function filterByADRService($service)
    {
        return response()->json($this->teamService->getTeamsByADRService($service));
    }

    // Chirayu new

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'area_of_practice' => 'nullable|array',
            'adr_services' => 'nullable|array',
            'all_rounder' => 'nullable|boolean',
            'type' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'experience' => 'nullable|array',
            'education' => 'nullable|array',
            'awards' => 'nullable|array',
            'socials' => 'nullable|array',
            'profile_image' => 'required',
        ]);

        $team = $this->teamService->createTeam($validatedData);

        return response()->json(
            [
                'success' => true,
                'message' => 'Team member created successfully',
                'data' => $team,
            ],
            201,
        );
    }
    public function delete($id)
    {
        // Fetch the team member by ID
        $teamMember = Team::find($id);

        if (!$teamMember) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Team member not found',
                ],
                404,
            );
        }

        // Check if the member has a profile image
        if ($teamMember->profile_image) {
            $imagePath = public_path($teamMember->profile_image);

            // Delete the image file if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the team member record
        $teamMember->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Team member and associated image deleted successfully.',
            ],
            200,
        );
    }

    public function filterTeams(Request $request)
    {
        $adrServices = $request->input('adr_services', []);
        $areaOfPractice = $request->input('area_of_practice', []);

        if (!is_array($adrServices) || !is_array($areaOfPractice)) {
            return response()->json(['error' => 'Invalid input format. Arrays expected.'], 400);
        }

        $teams = $this->teamService->getFilteredTeams($adrServices, $areaOfPractice);

        return response()->json($teams);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'nullable|string|max:255',
                'area_of_practice' => 'nullable|array',
                'adr_services' => 'nullable|array',
                'all_rounder' => 'nullable|boolean',
                'type' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'experience' => 'nullable|array',
                'education' => 'nullable|array',
                'awards' => 'nullable|array',
                'socials' => 'nullable|array',
            ]);

            $response = $this->teamService->updateTeam($id, $validatedData);

            return response()->json($response, $response['success'] ? 200 : 404);
        } catch (ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors(),
                ],
                422,
            );
        }
    }

    //based on designation
    public function getByDesignation($designation)
    {
        // Fetch team members based on designation
        $members = Team::where('designation', $designation)->get();

        // Check if data exists
        if ($members->isEmpty()) {
            return response()->json(['message' => 'No team members found with this designation.'], 404);
        }

        return response()->json($members, 200);
    }
}
