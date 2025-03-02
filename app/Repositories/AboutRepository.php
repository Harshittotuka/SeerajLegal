<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Models\Article;

class AboutRepository
{
    // Function to fetch FAQs from the FAQ model
    public function getFaqs()
    {
        return Faq::all();
    }
    // Function to fetch articles from the Articles model
    public function getArticles()
    {
        return Article::all();
    }
    
}
