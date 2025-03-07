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

    // Update FAQ by Sno
    public function updateFaq($Sno, array $data)
{
    $faq = Faq::find($Sno);

    if (!$faq) {
        return ['error' => 'FAQ not found'];
    }

    $faq->update($data);
    return $faq;
}
//delete FAQ by Sno
public function deleteFaq($Sno)
{
    $faq = Faq::find($Sno);

    if (!$faq) {
        return ['error' => 'FAQ not found'];
    }

    $faq->delete();
    return ['success' => true];
}
}
