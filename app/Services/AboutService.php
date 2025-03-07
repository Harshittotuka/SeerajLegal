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

    // Function to fetch AboutUs
    public function getWhoWeAre()
    {
        return $this->AboutRepository->getWhoWeAre();
    }

    // Update FAQ by Sno
    public function updateFaq($Sno, array $data)
    {
        return $this->AboutRepository->updateFaq($Sno, $data);
    }
    //delete from FAQ by Sno
    public function deleteFaq($Sno)
    {
        return $this->AboutRepository->deleteFaq($Sno);
    }
    
}

