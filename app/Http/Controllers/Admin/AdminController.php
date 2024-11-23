<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Repositories\CategoryRepository;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;

class AdminController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->table();
        $site = Page::where(['slug' => 'site'])->first();

        $responseView = [
            'site_all' => views($site)->remember(now()->addHour())->count(),
            'site_unique' => views($site)->unique()->remember(now()->addHour())->count(),

            'site_all_day' => views($site)->period(Period::since(Carbon::now()->format('Y-m-d')))->remember(now()->addHour())->count(),
            'site_unique_day' => views($site)->period(Period::since(Carbon::now()->format('Y-m-d')))->unique()->remember(now()->addHour())->count(),

            'category_all' => views(Category::class)->remember(now()->addHour())->count(),
            'category_unique' => views(Category::class)->unique()->remember(now()->addHour())->count(),

            'news_all' => views(News::class)->remember(now()->addHour())->count(),
            'news_unique' => views(News::class)->unique()->remember(now()->addHour())->count(),
        ];

        return view('admin/index', compact('categories', 'responseView'));
    }

    public function login()
    {
        return view('admin/login');
    }
}
