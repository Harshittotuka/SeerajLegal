<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;

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
        return response()->json($this->teamService->getTeamById($id));
    }

    public function filterByPractice($practice)
    {
        return response()->json($this->teamService->getTeamsByAreaOfPractice($practice));
    }

    public function filterByADRService($service)
    {
        return response()->json($this->teamService->getTeamsByADRService($service));
    }
}
