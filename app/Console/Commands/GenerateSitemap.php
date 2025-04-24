<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';
    protected $description = 'Generate sitemap.xml for all public pages and APIs';

    public function handle()
    {
        $baseUrl = config('app.url') ?? 'https://seerajlegal.com';

        $sitemap = Sitemap::create()
            ->add(Url::create("$baseUrl/dashboard"))
            ->add(Url::create("$baseUrl/test-mail"))

            // Public API endpoints
            ->add(Url::create("$baseUrl/api/teams"))
            ->add(Url::create("$baseUrl/api/membership-types"))
            ->add(Url::create("$baseUrl/api/homepage"))
            ->add(Url::create("$baseUrl/api/contacts"))
            ->add(Url::create("$baseUrl/api/practices"))
            ->add(Url::create("$baseUrl/api/practices/search"));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ sitemap.xml generated in /public');
    }
}
