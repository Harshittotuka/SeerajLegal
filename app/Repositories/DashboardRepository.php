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
        'practices' => Practice::distinct('practice_name')->count('practice_name'),
        'practices_disabled' => Practice::where('flag', 'disabled')->distinct('practice_name')->count('practice_name'),
        'services' => Service::distinct('service_name')->count('service_name'),
        'services_disabled' => Service::where('flag', 'disabled')->distinct('service_name')->count('service_name'),
        'members' => Member::count(),
        'teams' => Team::count(),
    ];
}

}
