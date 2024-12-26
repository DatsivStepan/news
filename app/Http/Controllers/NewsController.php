<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use App\Repositories\HomeSliderRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SettingRepository;
use App\Services\HomeServices;
use App\Services\NewsServices;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class NewsController extends Controller
{
    private $newsRepository;
    private $homeSliderRepository;
    private $newsServices;
    private $homeService;

    public function __construct(NewsRepository $newsRepository,
                                HomeSliderRepository $homeSliderRepository,
                                NewsServices $newsServices,
                                HomeServices $homeServices)
    {
        $this->newsRepository = $newsRepository;
        $this->homeSliderRepository = $homeSliderRepository;
        $this->newsServices = $newsServices;
        $this->homeService = $homeServices;
    }

    public function index()
    {
        $sliderNews = $this->homeSliderRepository->getSliderNews();
        $topNews = $this->homeService->getMainPageTopNews();
        $topCentralBlockNews = $this->homeService->getMainPageCentralNews();
        $bottomPageBlockNews = $this->homeService->getMainPageBottomNews();
        $blockTopBanner = $this->homeService->getMainPageTopBanner();

        return view('index', compact('blockTopBanner', 'bottomPageBlockNews','sliderNews', 'topNews', 'topCentralBlockNews'));
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
        $search = $request['query'];
        $options = [
            'search' => $request['query'],
            'viewType' => $request['type']
        ];

        $sort = [
            'field' => 'date_of_publication',
            'direction' => 'DESC'
        ];

        $news = $this->newsRepository->getPaginationNews($options,20, $sort);

        if ($request->ajax()) {

            $view = view('news.parts._news-search', compact('news'))->render();

            return response()->json(['html' => $view, 'pagin' => $news->hasMorePages()]);
        }

        return view('news.search', compact('news', 'search'));
    }

    public function tagSearch(Request $request)
    {
        $options = [
            'tagSearch' => $request['query'],
            'viewType' => $request['type']
        ];

        $sort = [
            'field' => 'date_of_publication',
            'direction' => 'DESC'
        ];

        $news = $this->newsRepository->getPaginationNews($options,20, $sort);

        if ($request->ajax()) {

            $view = view('news.parts._news-search', compact('news'))->render();

            return response()->json(['html' => $view, 'pagin' => $news->hasMorePages()	]);
        }
        $tag = $options['tagSearch'];
        return view('news.tag-search', compact('news', 'tag'));
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
