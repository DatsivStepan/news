<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\News;
use App\Models\User;
use App\Repositories\CategoryRelativeRepisitory;
use App\Repositories\CategoryRepository;
use App\Repositories\GalleryFilesRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\HomeSliderRepository;
use App\Repositories\NewsAuthorsRepository;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\NewsImageRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NewsTagRepository;
use App\Repositories\PaidNewsRepository;
use App\Services\AuthorServices;
use App\Services\NewsServices;
use App\Services\UserServices;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

ini_set('memory_limit', '512M');

class MigrateWordPressPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-word-press-posts {--deleted=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $newsRepository;
    protected $categoryRepository;
    protected $newsService;

    /**
     * Create a new console command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->newsRepository = app(NewsRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
        $this->categoryRelativeRepisitory = app(CategoryRelativeRepisitory::class);
        $this->newsCategoryRepository = app(NewsCategoryRepository::class);
        $this->newsTagRepository = app(NewsTagRepository::class);
        $this->homeSliderRepository = app(HomeSliderRepository::class);
        $this->paidNewsRepository = app(PaidNewsRepository::class);
        $this->newsImageRepository = app(NewsImageRepository::class);
        $this->newsAuthorsRepository = app(NewsAuthorsRepository::class);
        $this->galleryFilesRepository = app(GalleryFilesRepository::class);
        $this->galleryRepository = app(GalleryRepository::class);

        $this->newsService = app(NewsServices::class);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('deleted') == 1) {
            $this->transcateTables();
            $this->info("Tables transcated");

            $this->fillCategories();
            $this->info("Categories exported");

            $this->fillAuthors();
            $this->info("Author Checked");
        }

        $this->info("Start news export");
        $page = 1;
        $perPage = 100;
        $newsCountExported = 100;

        $startFrom = '2024-12-25 12:22:01';
        $news = News::orderBy('date_of_publication', 'desc')->first();
        if ($news && $news->date_of_publication) {
            $startFrom = $news->date_of_publication;
        }

        $wpAllPostsCount = DB::connection('wp_connection')
            ->table('wp_posts')
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->orderBy('ID')
            ->where('post_date', '>', $startFrom)
            ->count();

        $this->info("All news count - " . $wpAllPostsCount);

        do {
            // Підключаємося до бази WordPress
            $wpPosts = DB::connection('wp_connection')
                ->table('wp_posts')
                ->where('post_type', 'post')
                ->where('post_status', 'publish')
                ->where('post_date', '>', $startFrom)
                ->orderBy('post_date')
                ->forPage($page, $perPage)
                ->get();

            if (!$wpPosts->isEmpty()) {
                foreach ($wpPosts as $wpPost) {
                    try {

                        $wCategories = DB::connection('wp_connection')
                            ->table('wp_term_relationships as tr')
                            ->join('wp_term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                            ->join('wp_terms as t', 'tt.term_id', '=', 't.term_id')
                            ->where('tr.object_id', $wpPost->ID)
                            ->where('tt.taxonomy', 'category')
                            ->pluck('t.name');
                        if (!$wCategories) {
                            continue;
                        }
                        $categoryIds = Category::whereIn('name', $wCategories->toArray())->pluck('id');

                        $wTags = DB::connection('wp_connection')
                            ->table('wp_terms as t')
                            ->join('wp_term_taxonomy as tt', 't.term_id', '=', 'tt.term_id')
                            ->join('wp_term_relationships as tr', 'tt.term_taxonomy_id', '=', 'tr.term_taxonomy_id')
                            ->where('tr.object_id', $wpPost->ID)
                            ->where('tt.taxonomy', 'post_tag')
                            ->select('t.term_id', 't.name')
                            ->pluck('t.name');
                        if (!$wTags) {
                            continue;
                        }

                        $author = null;
                        $wpAuthor = DB::connection('wp_connection')
                            ->table('wp_users')
                            ->where('ID', $wpPost->post_author)
                            ->first();

                        if ($wpAuthor) {
                            $user = User::where('email', $wpAuthor->user_email)->first();
                            if ($user) {
                                $author = $user->author;
                            }
                        }

                        $thumbnailId = DB::connection('wp_connection')
                            ->table('wp_postmeta')
                            ->where('post_id', $wpPost->ID)
                            ->where('meta_key', '_thumbnail_id')
                            ->value('meta_value');

                        $thumbnailUrl = $thumbnailId ? DB::connection('wp_connection')
                            ->table('wp_posts')
                            ->where('ID', $thumbnailId)
                            ->value('guid') : null;
                        $uploadedFile = null;
                        if ($thumbnailUrl) {
//                        $tempPath = sys_get_temp_dir() . '/' . basename(parse_url($thumbnailUrl, PHP_URL_PATH));
//                        file_put_contents($tempPath, file_get_contents($thumbnailUrl));
//
//                        $file = new UploadedFile(
//                            $tempPath,
//                            basename($thumbnailUrl),
//                            mime_content_type($tempPath),
//                            null,
//                            true // Маркуємо файл як тимчасовий
//                        );

                            if (!$imageData = $this->fetchImageWithRetries($thumbnailUrl)) {
                                $this->info("missed main image - " .  $thumbnailUrl);
                                continue;
                            }

                            // Створюємо об'єкт UploadedFile
                            $file = new UploadedFile(
                                $imageData['path'],
                                $imageData['basename'],
                                $imageData['mime_type'],
                                null,
                                true // Маркуємо файл як тимчасовий
                            );

                            $uploadedFile = $file;
                        }

                        $description = $wpPost->post_content;
                        if (!mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8')) {
                            continue;
                        }
                        $doc = new \DOMDocument('1.0', 'UTF-8');
                        @$doc->loadHTML(mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                        $images = $doc->getElementsByTagName('img');

                        // Перебираємо всі <img> теги
                        foreach ($images as $img) {
                            $src = $img->getAttribute('src'); // Отримуємо поточний URL зображення

                            if (empty($src)) {
                                continue;
                            }

                            if (!$imageData = $this->fetchImageWithRetries($src)) {
                                $this->info("missed content image - " .  $src);
                                continue;
                            }

                            // Завантажуємо зображення та генеруємо новий шлях
                            $fileContent = file_get_contents($imageData['path']);

                            if ($fileContent !== false) {
                                $fileName = basename(parse_url($src, PHP_URL_PATH)); // Отримуємо назву файлу з URL
                                $fileName = Str::random(10) . '-' . $fileName; // Додаємо унікальність до імені
                                Storage::disk('public')->put("uploads/$fileName", $fileContent);

                                // Формуємо новий URL для зображення
                                $newSrc = Storage::url("uploads/$fileName");

                                // Замінюємо старий src на новий у <img> тегі
                                $img->setAttribute('src', $newSrc);
                            }
                        }

                        // Повертаємо змінений HTML
                        $description = $doc->saveHTML();

                        $mainNews = DB::connection('wp_connection')
                            ->table('wp_postmeta')
                            ->where('post_id', $wpPost->ID)
                            ->where('meta_key', 'bold')
                            ->value('meta_value');

                        $showType = News::SHOW_TYPE_TEXT;

                        $newsIcPhoto = DB::connection('wp_connection')
                            ->table('wp_postmeta')
                            ->where('post_id', $wpPost->ID)
                            ->where('meta_key', 'ic-photo')
                            ->value('meta_value');
                        if ($newsIcPhoto) {
                            $showType = News::SHOW_TYPE_IMAGE;
                        }


                        $newsIcVideo = DB::connection('wp_connection')
                            ->table('wp_postmeta')
                            ->where('post_id', $wpPost->ID)
                            ->where('meta_key', 'ic-video')
                            ->value('meta_value');
                        if ($newsIcVideo) {
                            $showType = News::SHOW_TYPE_VIDEO;
                        }

                        $slug = $wpPost->post_name ? urldecode($wpPost->post_name) : Str::slug($wpPost->post_title);
                        if (News::where('slug', $slug)->exists()) {
                            continue;
                        }
                        $data = [
                            'title' => $wpPost->post_title,
                            'slug' => $slug,
                            'image' => $uploadedFile,
                            'subtitle' => $wpPost->post_excerpt,
                            'mini_description' => $wpPost->post_excerpt,
                            'description' => $description,
                            'category_ids' => $categoryIds,
                            'author_id' => $author ? $author->id : null,
                            'tags' => implode(',', $wTags->toArray()),
                            'type_publication' => 1, // 1 - опубліковано
                            'type' => $mainNews ? 2 : 1, //1 - звичайно  2 - головна
                            'show_type' => $showType,
                            'date_of_publication' => $wpPost->post_date,
                        ];
                        $this->newsService->saveNews($data);

                    } catch (\Throwable $e) {
                        $this->info("Something get wrong (" . $wpPost->id . ") - "  . $e->getMessage());
                    }
                }
            }
            $this->info("Page $page; export $newsCountExported out of $wpAllPostsCount");
            $page++;
            $newsCountExported += 100;
        } while (!$wpPosts->isEmpty());

        $this->info("Finished news export");
    }

    protected function transcateTables()
    {
        $this->categoryRelativeRepisitory->getQuery()->delete();
        $this->categoryRepository->getQuery()->delete();
        $this->categoryRelativeRepisitory->getQuery()->delete();
        $this->newsCategoryRepository->getQuery()->delete();
        $this->homeSliderRepository->getQuery()->delete();
        $this->paidNewsRepository->getQuery()->delete();
        $this->newsImageRepository->getQuery()->delete();
        $this->newsAuthorsRepository->getQuery()->delete();
        $this->galleryFilesRepository->getQuery()->delete();
        $this->galleryRepository->getQuery()->delete();
        $this->newsRepository->getQuery()->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('news')->truncate();
        DB::table('tags')->truncate();
        DB::table('views')->truncate();
        DB::table('news_tags')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    protected function fillAuthors()
    {
        $postsWithAuthors = DB::connection('wp_connection')
            ->table('wp_users')
            ->get();
        foreach ($postsWithAuthors as $postWithAuthor) {

            $displayName = explode(' ', $postWithAuthor->display_name);

            if (User::where('email', $postWithAuthor->user_email)->exists()) {
                continue;
            }

            $data = [
                'name' => !empty($displayName[1]) ? $displayName[1] : $displayName[0],
                'surname' => $displayName[0],
                'role' => 'Manager',
                'patronymic' => ' ',
                'biography' => 'Біографія',
                'email' => $postWithAuthor->user_email,
                'password' => 11111111,
            ];
            $userService = app(UserServices::class);
            $userService->saveUser($data);
        }

        $users = User::get();
        foreach ($users as $user) {
            if ($user->author) {
                continue;
            }
            $authorService = app(AuthorServices::class);
            $authorService->saveAuthors([
                'user_id' => $user->id,
                'surname' => $user->name,
                'name' => $user->name,
                'patronymic' => ' ',
                'biography' => ' ',
            ]);
        }
    }

    protected function fetchImageWithRetries($thumbnailUrl, $maxRetries = 5, $retryDelay = 2)
    {
        $tempPath = sys_get_temp_dir() . '/' . basename(parse_url($thumbnailUrl, PHP_URL_PATH));

        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            // Отримуємо заголовки
            $headers = @get_headers($thumbnailUrl, 1);
            if ($headers) {
                // Перевіряємо, чи є перенаправлення
                if (isset($headers['Location'])) {
                    $thumbnailUrl = is_array($headers['Location'])
                        ? end($headers['Location']) // Беремо останній URL, якщо є кілька
                        : $headers['Location'];
                }

                // Перевіряємо, чи це успішна відповідь (200 OK)
                if (isset($headers[0]) && strpos($headers[0], '200') !== false) {
                    $imageData = @file_get_contents($thumbnailUrl);
                    if ($imageData) {
                        file_put_contents($tempPath, $imageData);

                        return [
                            'path' => $tempPath,
                            'basename' => basename($thumbnailUrl),
                            'mime_type' => mime_content_type($tempPath),
                        ];
                    }
                }
            }

            // Затримка перед наступною спробою
            sleep($retryDelay);
        }

        // Якщо зображення не вдалося завантажити
        return null;
    }

    protected function fillCategories()
    {
        $parentCategories = DB::connection('wp_connection')->table('wp_terms')
            ->join('wp_term_taxonomy', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->where('wp_term_taxonomy.taxonomy', 'category')
            ->where('wp_term_taxonomy.parent', '0')
            ->select('wp_terms.term_id', 'wp_terms.slug', 'wp_terms.name',
                'wp_term_taxonomy.parent', 'wp_term_taxonomy.description')
            ->get();

        foreach ($parentCategories as $pCategory) {
            $pCategoryModel = $this->categoryRepository->create([
                'name' => $pCategory->name,
                'slug' => $pCategory->slug,
                'description' => $pCategory->description,
            ]);
            if (!$pCategoryModel) {
                continue;
            }

            $childCategories = DB::connection('wp_connection')->table('wp_terms')
                ->join('wp_term_taxonomy', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
                ->where('wp_term_taxonomy.taxonomy', 'category')
                ->where('wp_term_taxonomy.parent', $pCategory->term_id)
                ->select('wp_terms.term_id', 'wp_terms.slug', 'wp_terms.name',
                    'wp_term_taxonomy.parent', 'wp_term_taxonomy.description')
                ->get();
            foreach ($childCategories as $childCategory) {
                $cCategoryModel = $this->categoryRepository->create([
                    'name' => $childCategory->name,
                    'slug' => $childCategory->slug,
                    'description' => $childCategory->description,
                ]);
                if (!$cCategoryModel) {
                    continue;
                }

                $this->categoryRelativeRepisitory->create([
                    'parent_id' => $pCategoryModel->id,
                    'category_id' => $cCategoryModel->id,
                ]);
            }
        }
    }
}
