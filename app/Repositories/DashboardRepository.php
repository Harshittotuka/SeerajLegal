<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Practice;
use App\Models\Team;
use App\Models\Member;

class DashboardRepository
{
    public function getCounts()
    {
        return [
            'practices' => Practice::count(),
            'practices_disabled' => Practice::where('flag', 'disabled')->count(),
            'services' => Service::count(),
            'services_disabled' => Service::where('flag', 'disabled')->count(),
            'members' => Member::count(),
            'teams' => Team::count(),
        ];
    }
}
