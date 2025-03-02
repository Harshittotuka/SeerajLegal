<?php

namespace App\Repositories;

use App\Models\Homepage;

class HomepageRepository
{
    // Fetch all homepage data
    public function getAllData()
    {
        return Homepage::all();
    }
}
