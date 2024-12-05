<?php

namespace App\Widgets;

use App\Classes\Enum\NewsPublicationType;
use App\Models\News;
use App\Repositories\NewsRepository;
use Arrilot\Widgets\AbstractWidget;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class RecommendNews extends AbstractWidget
{
    public function run()
    {
        $v = app(Visitor::class);
        $visitorId = $v->id();

        // Перевіряємо, чи є у користувача перегляди
        $hasViews = DB::table('views')
            ->where('visitor', $visitorId)
            ->exists();

        if (!$hasViews) {
            // Якщо переглядів немає, повертаємо останні три новини
            $recommendedNews =  News::orderBy('created_at', 'desc')->limit(3)->get();
            return view('widgets.recommend_news', compact('recommendedNews'));
        }

        // Категорії з переглянутих новин
        $categoryIdsFromNews = DB::table('views')
            ->join('news_categories', 'views.viewable_id', '=', 'news_categories.news_id')
            ->where('views.viewable_type', 'App\\Models\\News')
            ->where('views.visitor', $visitorId)
            ->pluck('news_categories.category_id');

        // Категорії, які користувач переглядав безпосередньо
        $directCategoryIds = DB::table('views')
            ->where('viewable_type', 'App\\Models\\Category')
            ->where('visitor', $visitorId)
            ->pluck('viewable_id');

        // Об'єднання категорій
        $allCategoryIds = $categoryIdsFromNews->merge($directCategoryIds)->unique();

        // Отримання новин через таблицю зв’язку `news_categories`
        $viewedNewsIds = DB::table('views')
            ->where('viewable_type', 'App\\Models\\News')
            ->where('visitor', $visitorId)
            ->pluck('viewable_id');

        $recommendedNews = News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->whereIn('news_categories.category_id', $allCategoryIds)
            ->whereNotIn('news.id', $viewedNewsIds)
            ->orderBy('news.created_at', 'desc')
            ->limit(3)
            ->get(['news.*']);

        return view('widgets.recommend_news', compact('recommendedNews'));
    }
}
