<?php

namespace App\Http\Controllers;

use App\Classes\Enum\NewsPublicationType;
use App\Filters\NewsFilter;
use App\Filters\SearchNews;
use App\Models\Category;
use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\HomeSliderRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SettingRepository;
use App\Services\CategoryServices;
use App\Services\HomeServices;
use App\Services\NewsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class NewsController extends Controller
{
    private $newsRepository;
    private $homeSliderRepository;
    private $newsServices;

    public function __construct(NewsRepository $newsRepository,
                                HomeSliderRepository $homeSliderRepository,
                                NewsServices $newsServices)
    {
        $this->newsRepository = $newsRepository;
        $this->homeSliderRepository = $homeSliderRepository;
        $this->newsServices = $newsServices;
    }

    public function index()
    {
        $sliderNews = $this->homeSliderRepository->getSliderNews();
        $mainBlock = HomeServices::getHeaderMainBlockCategory();
        $mainBlocktwo = HomeServices::getHeaderMainBlockCategorytwo();

        return view('index', compact('sliderNews', 'mainBlock', 'mainBlocktwo'));
    }

    public function listNews(Request $request)
    {
        $news = News::paginate(20);
        $view = view('news._list-news', compact('news'))->render();

        return response()->json(['html' => $view]);
    }

    public function contacts(Request $request)
    {
        return view('news.contacts');
    }

    public function loaderNews(Request $request)
    {
        $news = News::where('id', '<', $request->lastNewId )->orderBy('id','DESC')->first();
        $view = '';
        if ($news) {
            $view = view('news._loder_news', compact('news'))->render();
        }

        return response()->json(['html' => $view, 'newsId' => $news ? $news->id : 0]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = $this->newsRepository->getOneOrFail($slug, 'slug');

        $news->description = $this->newsServices->prepareGallery($news->description);

//        dd($news->description);

        views($news)->record();

        $shareComponent = \Share::page(
            $news->getUrl(),
            $news->title,
        )
            ->facebook()
            ->twitter()
            ->telegram();

        return view('news.show', compact('news', 'shareComponent'));
    }

    public function search(Request $request)
    {
        $options = [
            'search' => $request['query'],
            'viewType' => $request['type']
        ];

        $sort = [
            'field' => 'created_at',
            'direction' => 'DESC'
        ];

        $news = $this->newsRepository->getPaginationNews($options,20, $sort);

        if ($request->ajax()) {

            $view = view('news.parts._news-search', compact('news'))->render();

            return response()->json(['html' => $view, 'pagin' => $news->hasMorePages()	]);
        }

        return view('news.search', compact('news'));
    }

    public function tagSearch(Request $request)
    {
        $options = [
            'tagSearch' => $request['query'],
            'viewType' => $request['type']
        ];

        $sort = [
            'field' => 'created_at',
            'direction' => 'DESC'
        ];

        $news = $this->newsRepository->getPaginationNews($options,20, $sort);

        if ($request->ajax()) {

            $view = view('news.parts._news-search', compact('news'))->render();

            return response()->json(['html' => $view, 'pagin' => $news->hasMorePages()	]);
        }

        return view('news.tag-search', compact('news'));
    }

    public function allNews(Request $request)
    {
        $options = [
            'viewType' => $request['type']
        ];
        $sort = [
            'field' => 'date_of_publication',
            'direction' => 'DESC'
        ];

        $news = $this->newsRepository->getPaginationNews($options,20, $sort);

        if ($request->ajax()) {
            $date = $request['date'];
            $view = view('news.parts._news-full-width', compact('news','date'))->render();

            return response()->json(['html' => $view, 'pagin' => $news->hasMorePages()	]);
        }

        return view('news.index', compact('news'));
    }
}
