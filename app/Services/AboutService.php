<?php

namespace App\Services;

use App\Repositories\AboutRepository;

class AboutService
{
    protected $AboutRepository;

    public function __construct(AboutRepository $AboutRepository)
    {
        $this->AboutRepository = $AboutRepository;
    }

    // Function to fetch FAQs
    public function getFaqs()
    {
        return $this->AboutRepository->getFaqs();
    }
    // Function to fetch articles
    public function getArticles()
    {
        return $this->AboutRepository->getArticles();
    }
}
