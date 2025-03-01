<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqRepository
{
    public function getAllFaqs()
    {
        return Faq::all();
    }
}
