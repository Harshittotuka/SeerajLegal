<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Models\AboutUs;

class AboutRepository
{
    // Function to fetch FAQs from the FAQ model
    public function getFaqs()
    {
        return Faq::all();
    }
    // Function to fetch AboutUs from the AboutUs model
    public function getWhoWeAre()
    {
        return AboutUs::all();
    }
    
}
