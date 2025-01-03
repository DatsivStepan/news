<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-login', [App\Http\Controllers\Admin\AdminController::class,'login'])->name('admin-login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AdminLoginController::class,'login'])->name('admin.login');
Route::get('/ukrnet/rss', [\App\Http\Controllers\RssController::class, 'generateRss']);
Route::get('/urknet/feed', [\App\Http\Controllers\RssController::class, 'generateRSSWithNewlines']);

Route::group(['middleware' => ['auth']], function() {
//    Route::group(['middleware' => ['role:Admin|Manager']], function () {
        Route::prefix('admin')->name('admin.')->group(function() {
            Route::get('/', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
            Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

            Route::post('gallery/upload', [\App\Http\Controllers\Admin\GalleryController::class, 'fileStore']);
            Route::post('gallery/destroy',[\App\Http\Controllers\Admin\GalleryController::class, 'fileDestroy']);
            Route::resource('gallery', \App\Http\Controllers\Admin\GalleryController::class);
            Route::get('news/drafts', [App\Http\Controllers\Admin\NewsController::class, 'drafts'])->name('news.drafts');
            Route::get('news/basket', [App\Http\Controllers\Admin\NewsController::class, 'basket'])->name('news.basket');
            Route::post('news/upload', [\App\Http\Controllers\Admin\NewsController::class, 'upload'])->name('news.upload');;
            Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
            Route::resource('authors', \App\Http\Controllers\Admin\AuthorController::class);
            Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
            Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);
//            Route::group(['middleware' => ['role:Admin']], function () {
                Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
                Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
//            });
            Route::resource('sliders', \App\Http\Controllers\Admin\HomeSliderController::class);
            Route::resource('files', \App\Http\Controllers\Admin\FileController::class);
            Route::resource('paidNews', \App\Http\Controllers\Admin\PaidNewsController::class);
            Route::post('addItemsSettings', [App\Http\Controllers\Admin\SettingController::class, 'addItemsSettings']);
            Route::post('addNewsOnSlider', [App\Http\Controllers\Admin\NewsController::class, 'addNewsOnSlider']);
            Route::post('changePassword', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('changePassword');
            Route::post('changeSort', [App\Http\Controllers\Admin\HomeSliderController::class, 'changeSort'])->name('changeSort');
            Route::get('publishNews/{id}', [App\Http\Controllers\Admin\NewsController::class, 'publishNews'])->name('publishNews');
            Route::get('restorationNews/{id}', [App\Http\Controllers\Admin\NewsController::class, 'restorationNews'])->name('restorationNews');
            Route::delete('news/finalDelete/{id}', [App\Http\Controllers\Admin\NewsController::class, 'finalDelete'])->name('news.finalDelete');

        });
//    });
});

Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('page', \App\Http\Controllers\PageController::class);
Route::get('author/{slug}', [App\Http\Controllers\AuthorController::class, 'index'])->name('author.show');
Route::get('loader-news', [App\Http\Controllers\NewsController::class, 'loaderNews'])->name('loader-news');
Route::get('allNews', [App\Http\Controllers\NewsController::class, 'allNews'])->name('allNews');
Route::get('listNews', [App\Http\Controllers\NewsController::class, 'listNews'])->name('listNews');
Route::get('news', [App\Http\Controllers\NewsController::class, 'allNews'])->name('news');
Route::get('news/{slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('search', [App\Http\Controllers\NewsController::class, 'search'])->name('search');
Route::get('tag-search', [App\Http\Controllers\NewsController::class, 'tagSearch'])->name('tag.search');
Route::get('contacts', [App\Http\Controllers\NewsController::class, 'contacts'])->name('contacts');

Auth::routes();

