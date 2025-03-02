<?php

namespace App\Services;

use App\Repositories\HomepageRepository;

class HomepageService
{
    protected $homepageRepository;

    public function __construct(HomepageRepository $homepageRepository)
    {
        $this->homepageRepository = $homepageRepository;
    }

    // Get all homepage data
    public function getAllData()
    {
        return $this->homepageRepository->getAllData();
    }
}
