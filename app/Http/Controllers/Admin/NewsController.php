<?php

namespace App\Http\Controllers\Admin;

use App\Filters\NewsBasketFilter;
use App\Filters\NewsDraftsFilter;
use App\Filters\NewsFilter;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Repositories\AuthorsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\HomeSliderRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PaidNewsRepository;
use App\Repositories\UserRepository;
use App\Services\NewsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    private $newsRepository;

    private $newsServices;

    private $categoryRepository;
    private $userRepository;
    private $galleryRepository;
    private $paidNewsRepository;
    private $homeSliderRepository;

    private $authorsRepository;

    public function __construct(
        NewsRepository $newsRepository,
        NewsServices $newsServices,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        HomeSliderRepository $homeSliderRepository,
        AuthorsRepository $authorsRepository,
        PaidNewsRepository $paidNewsRepository,
        GalleryRepository $galleryRepository
    )
    {
        $this->paidNewsRepository = $paidNewsRepository;
        $this->newsServices = $newsServices;
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
        $this->authorsRepository = $authorsRepository;
        $this->homeSliderRepository = $homeSliderRepository;
        $this->userRepository = $userRepository;
        $this->galleryRepository = $galleryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsFilter $request)
    {
        $news = $this->newsRepository->getNews($request);

        return view('admin.news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * $news->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = [];
        $tags = $image = '';
        $news = new News();
        //$news->author = auth()->user()->author->id;
        $news->category = request()->get('category_id');

        $categories += [
            '' => 'Виберіть Батьківську Категорію'
        ];
        $categories += $this->categoryRepository->getParentsCategoriesForNews();
        $authors = $this->authorsRepository->getAuthors();
        $galleries = Gallery::orderBy('id', 'DESC')->get()->toArray();
        $galleries = json_encode(Arr::map($galleries, function ($value, $key) {
            return ['text' => $value['id'] . ' | ' . $value['name'], 'value' => (string)$value['id']];
        }));

        return view('admin.news.create', compact('news', 'tags', 'image', 'categories', 'authors', 'galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate(News::$rules);

        $this->newsServices->saveNews($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully.');
    }

    public function upload(Request $request){
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => "/storage/$path"]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->getOneOrFail($id);

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->getOneOrFail($id);
        $categories = $this->categoryRepository->getCategories();
        $authors = $this->authorsRepository->getAuthors();

        $image = implode("','", $news->image->pluck('path')->toArray());
        $tags = implode(",", $news->tags->pluck('name')->toArray());

        $galleries = Gallery::orderBy('id', 'DESC')->get()->toArray();
        $galleries = json_encode(Arr::map($galleries, function ($value, $key) {
            return ['text' => $value['id'] . ' | ' . $value['name'], 'value' => (string)$value['id']];
        }));

        return view('admin.news.edit', compact('news','tags', 'image', 'categories', 'authors', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = request()->validate(News::$rules);

        $data['show_author'] = isset($data['show_author']) ? 1 : 0;
        $this->newsServices->updateNews($news, $data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Новина успішно збережена');
    }

    public function addNewsOnSlider(Request $request)
    {
        $this->newsServices->addNewsOnSlider($request);

        return response()->json(true);
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->getOneOrFail($id);
        if($this->newsRepository->delete($news)) {
            if($news->home_slider) {
                $homeSlider = $this->homeSliderRepository->getOneOrFail($id, 'news_id');
                $this->homeSliderRepository->delete($homeSlider);
            }
            if($news->paidNews) {
                $paid_news = $this->paidNewsRepository->getOneOrFail($id, 'news_id');
                $this->paidNewsRepository->delete($paid_news);
            }
        }
        return redirect()->route('admin.news.index')
            ->with('success', 'Новина успішно видалена');
    }

    public function drafts(NewsDraftsFilter $request)
    {
        $news = $this->newsRepository->getNewsDrafts($request);

        return view('admin.news.drafts', compact('news'));
    }

    public function basket(NewsBasketFilter $request)
    {
        $news = $this->newsRepository->getNewsBasket($request);

        return view('admin.news.basket', compact('news'));
    }

    public function publishNews(Request $request)
    {
        $news = $this->newsRepository->getOneOrFail($request->id, 'id');
        $this->newsRepository->update($news,[
            'type_publication' => '1'
        ]);
        return redirect(route('admin.news.drafts'));
    }

    public function restorationNews(Request $request)
    {
        $this->newsRepository->restoreNews($request->id);

        return redirect(route('admin.news.basket'));
    }

    public function finalDelete(Request $request)
    {
        $this->newsRepository->finalDelete($request->id);

        return redirect(route('admin.news.basket'));
    }
}
