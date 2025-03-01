<?php

namespace App\Services;

use App\Repositories\FaqRepository;

class FaqService
{
    protected $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function getAllFaqs()
    {
        return $this->faqRepository->getAllFaqs();
    }
}
