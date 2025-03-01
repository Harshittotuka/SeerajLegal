<?php

namespace App\Repositories;

use App\Models\Faq;

class AboutRepository
{
    // Function to fetch FAQs from the FAQ model
    public function getFaqs()
    {
        return Faq::all();
    }
}
