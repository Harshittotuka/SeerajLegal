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

    // Function to fetch who we are according to S_id from the AboutUs model
    public function getWhoWeAre(array $S_ids)
    {
        return AboutUs::whereIn('S_id', $S_ids)
                     ->where('flag', 'enabled')
                     ->orderBy('S_order', 'asc')
                     ->get();
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
public function createFaq($data)
{
    return Faq::create($data);
}
}
