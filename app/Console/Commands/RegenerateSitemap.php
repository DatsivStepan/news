<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class RegenerateSitemap  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Generate site map started.');
//        $path = public_path('sitemap.xml');
//        SitemapGenerator::create('https://koroldanylo.com.ua/')->writeToFile($path);


        // Manually create sitemap
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add('/');

        $categories = Category::orderBy('updated_at', 'desc')->limit(50000)->get();
        foreach ($categories as $category) {
            $sitemap->add($category->getUrl());
        }

        // Dynamic pages
        $newses = News::get();
        foreach ($newses as $news) {
            $sitemap->add($news->getUrl());
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        Log::info('Generate site map ended.');
    }
}
