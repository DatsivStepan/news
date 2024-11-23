<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AuthorFilter;
use App\Filters\CategoryFilter;
use App\Filters\GalleryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryCreateRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Setting;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRelativeRepisitory;
use App\Repositories\GalleryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SettingRepository;
use App\Services\GalleryServices;
use App\Services\SettingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Class GalleryController
 * @package App\Http\Controllers
 */
class GalleryController extends Controller
{
    private $galleryRepository;
    private $galleryService;

    public function __construct(
        GalleryRepository $galleryRepository,
        GalleryServices $galleryService
    )
    {
        $this->galleryRepository = $galleryRepository;
        $this->galleryService = $galleryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GalleryFilter $request)
    {
        $galleries = $this->galleryRepository->table();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = new Gallery();
        return view('admin.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
        $data = $request->validated();

        $this->galleryService->create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Галерея успішно створена.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = $this->galleryRepository->getOneOrFail($id);
        $this->galleryService->prepareToUpdate($gallery);

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryCreateRequest $request, Gallery $gallery)
    {
        $data = $request->validated();

        $this->galleryService->update($gallery, $data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Галерея успішно редагована');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->galleryRepository->getOneOrFail($id)->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Галерея успішно видалена.');
    }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/galleries'), $imageName);

        $imageUpload = new File();
        $imageUpload->name = $imageName;
        $imageUpload->path = '/images/galleries/' . $imageName;
        $imageUpload->type = 0;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        File::where('name', $filename)->delete();
        $path = public_path() . '/images/galleries/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
