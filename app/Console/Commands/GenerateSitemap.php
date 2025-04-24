<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Practice;

class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';
    protected $description = 'Generate sitemap.xml dynamically using DB routes';

    public function handle()
    {
        $base = config('app.url') ?? 'https://seerajlegal.com';

        $sitemap = Sitemap::create()

            // Static pages
            ->add(Url::create("$base/"))
            ->add(Url::create("$base/about"))
            ->add(Url::create("$base/faq"))
            ->add(Url::create("$base/services"))
            ->add(Url::create("$base/service_rules"))
            ->add(Url::create("$base/membership/become-a-member"))
            ->add(Url::create("$base/membership/member-list"))
            ->add(Url::create("$base/membership/panel"))
            ->add(Url::create("$base/practices"))
            ->add(Url::create("$base/team"))
            ->add(Url::create("$base/team-details"))
            ->add(Url::create("$base/contact"));

        // ✅ Dynamic Services
        Service::where('flag', 'enabled')->get()->each(function ($service) use ($sitemap, $base) {
            $slug = urlencode($service->service_name); // URL-safe
            $sitemap->add(Url::create("$base/service/$slug"));
        });

        // ✅ Dynamic Practices
        Practice::where('flag', 'enabled')->get()->each(function ($practice) use ($sitemap, $base) {
            $slug = urlencode($practice->practice_name);
            $sitemap->add(Url::create("$base/practice/$slug"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generated including DB-driven services and practices.');
    }
}
