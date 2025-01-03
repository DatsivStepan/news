<?php

namespace App\Services;

use App\Models\Image;
use App\Models\News;
use App\Models\Setting;
use App\Models\Tag;
use App\Repositories\CategoryRepository;
use App\Repositories\FileRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PageRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Cache;


/**
 * Class FlightServices
 */
class HomeServices
{

    private $imageRepository;
    private $pageRepository;
    private $settingRepository;
    private $newsRepository;
    private $tagRepository;
    private $categoryRepository;

    public function __construct(
        FileRepository     $imageRepository,
        SettingRepository  $settingRepository,
        NewsRepository     $newsRepository,
        PageRepository     $pageRepository,
        TagRepository     $tagRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->tagRepository = $tagRepository;
        $this->imageRepository = $imageRepository;
        $this->settingRepository = $settingRepository;
        $this->categoryRepository = $categoryRepository;
        $this->pageRepository = $pageRepository;
    }

    public static function getHeaderMainBlockCategory()
    {
        $setting = app(SettingRepository::class)->getOne(Setting::BLOCKS_CATEGORY_HOME_PAGE, 'key');
        if (!empty($setting->value)) {
            return app(NewsRepository::class)->getLastNewsForCategoory(explode(',', $setting->value)[0]);
        }
        return null;
    }

    public static function getHeaderMainBlockCategorytwo()
    {
        $setting = app(SettingRepository::class)->getOne(Setting::BLOCKS_CATEGORY_HOME_PAGE, 'key');

        if (array_key_exists('1',explode(',', $setting->value)))
        {
            $news1 = app(NewsRepository::class)->getLastNewsForCategoory(explode(',', $setting->value)[1]);
        }

        if (array_key_exists('2',explode(',', $setting->value)))
        {
            $news2 = app(NewsRepository::class)->getLastNewsForCategoory(explode(',', $setting->value)[2]);
        }

        if (isset($news1) && isset($news2)) {
            return collect([
               $news1,
               $news2,
           ]);

        }
    }

    public static function getPopupMenuOptions($resetCache = false)
    {
        if (($value = Cache::get('popup-menu')) && !$resetCache) {
            return $value;
        }

        $setting = app(SettingRepository::class)->getOne(Setting::HEADER_POPUP_MENU_OPTIONS, 'key');
        $items = explode("\r\n", $setting->value);
        if (!$items) {
            return [];
        }

        $categoryRepository = app(CategoryRepository::class);
        $pageRepository = app(PageRepository::class);

        $result = [];
        $childCounter = 0;
        foreach ($items as $item) {
            $item = trim($item);
            $isChild = strpos($item, '-') === 0;
            $item = ltrim($item, '-');

            [$type, $slug, $forceName] = array_pad(explode(',', $item), 3, null);

            // Створюємо елемент
            $element = [];
            switch ($type) {
                case Setting::MENU_OPTION_CATEGORY:
                    $category = $categoryRepository->getOne($slug, 'slug');
                    if (!$category) {
                        break;
                    }

                    $childCategories = [];
                    if (!$isChild && !$category->childrenCategories->isEmpty()) {
                        foreach ($category->childrenCategories as $childCategory) {
                            $childCategories[] = [
                                'name' => $childCategory->getName(),
                                'url' => $childCategory->getUrl(),
                            ];
                        }
                    }

                    $element = [
                        'info' => [
                            'name' => $forceName ? : $category->getName(),
                            'url' => $category->getUrl(),
                        ],
                        'child' => $childCategories
                    ];

                    break;
                case Setting::MENU_OPTION_HASH:
                    if ($forceName) {
                        $element = [
                            'info' => [
                                'name' => $forceName,
                                'url' => '#',
                            ],
                            'child' => []
                        ];
                    }
                    break;
                case Setting::MENU_OPTION_PAGE:
                    $page = $pageRepository->getOne($slug, 'slug');
                    if (!$page) {
                        break;
                    }
                    $element = [
                        'info' => [
                            'name' => $forceName ? : $page->getName(),
                            'url' => $page->getUrl(),
                        ],
                        'child' => []
                    ];
                    break;
            }


            if (!$element) {
                continue;
            }

            if ($isChild) {
                $countResult = count($result);
                if ($childCounter == 0) {
                    $result[$countResult-1]['child'] = [];
                }
                $result[$countResult-1]['child'][] = $element['info'];
                $childCounter++;
            } else {
                $childCounter = 0;
                $result[] = $element;
            }
        }

        Cache::put('popup-menu', $result);

        return $result;
    }

    public static function getMainMenuOptions($resetCache = false)
    {
        if (($value = Cache::get('main-menu')) && !$resetCache) {
            return $value;
        }

        $sRepository = app(SettingRepository::class);
        $setting = $sRepository->getOne(Setting::HEADER_MAIN_MENU_OPTIONS, 'key');
        $items = explode("\r\n", $setting->value);
        if (!$items) {
            return [];
        }

        $categoryRepository = app(CategoryRepository::class);
        $pageRepository = app(PageRepository::class);

        $result = [];
        $childCounter = 0;
        foreach ($items as $item) {
            $item = trim($item);
            $isChild = strpos($item, '-') === 0;
            $item = ltrim($item, '-');

            [$type, $slug, $forceName] = array_pad(explode(',', $item), 3, null);

            // Створюємо елемент
            $element = [];
            switch ($type) {
                case Setting::MENU_OPTION_CATEGORY:
                    $category = $categoryRepository->getOne($slug, 'slug');
                    if (!$category) {
                        break;
                    }

                    $childCategories = [];
                    if (!$isChild && !$category->childrenCategories->isEmpty()) {
                        foreach ($category->childrenCategories as $childCategory) {
                            $childCategories[] = [
                                'name' => $childCategory->getName(),
                                'url' => $childCategory->getUrl(),
                            ];
                        }
                    }

                    $element = [
                        'info' => [
                            'name' => $forceName ? : $category->getName(),
                            'url' => $category->getUrl(),
                        ],
                        'child' => $childCategories
                    ];

                    break;
                case Setting::MENU_OPTION_PAGE:
                    $page = $pageRepository->getOne($slug, 'slug');
                    if (!$page) {
                        break;
                    }
                    $element = [
                        'info' => [
                            'name' => $forceName ? : $page->getName(),
                            'url' => $page->getUrl(),
                        ],
                        'child' => []
                    ];
                    break;
            }


            if (!$element) {
                continue;
            }

            if ($isChild) {
                $countResult = count($result);
                if ($childCounter == 0) {
                    $result[$countResult-1]['child'] = [];
                }
                $result[$countResult-1]['child'][] = $element['info'];
                $childCounter++;
            } else {
                $childCounter = 0;
                $result[] = $element;
            }
        }

        Cache::put('main-menu', $result);

        return $result;
    }

    public static function getMainMenuTags($resetCache = false)
    {
        if (($value = Cache::get('main-menu-tags')) && !$resetCache) {
            return $value;
        }

        $sRepository = app(SettingRepository::class);
        $setting = $sRepository->getOne(Setting::HEADER_MAIN_MENU_TAGS, 'key');
        $items = explode(",", $setting->value);
        if (!$items) {
            return [];
        }

        Cache::put('main-menu-tags', $items);

        return $items;
    }

    public static function getMainPageTopBanner($resetCache = false)
    {
        if (($value = Cache::get('main-page-top-banner')) && !$resetCache) {
            return $value;
        }

        $sRepository = app(SettingRepository::class);
        $setting = $sRepository->getOne(Setting::MAIN_PAGE_TOP_BANNER, 'key');
        if (empty($setting->value)) {
            return '';
        }

        Cache::put('main-page-top-banner', $setting->value);

        return $setting->value;
    }

    public function getMainPageCentralNews($resetCache = false)
    {
        if (($value = Cache::get('main-page-central-news')) && !$resetCache) {
            return collect($value);
        }

        $setting = app(SettingRepository::class)->getOne(Setting::MAIN_PAGE_CENTRAL_BLOCK_CATEGORY, 'key');
        $categoryIds = explode(",", $setting->value);
        if (!$categoryIds) {
            return [];
        }

        $options = [
            'filters' => [
                'slug' => $categoryIds,
            ]
        ];
        if (!$categories = $this->categoryRepository->get($options)) {
            return [];
        }
        $resNews = [];
        foreach ($categories as $category) {
            if (!$lastNews = $category->latestNews()->first()) {
                continue;
            }
            $resNews[] = [
                'url' => $lastNews->getUrl(),
                'image_url' => $lastNews->getImageUrl(\App\Models\File::PATH_MEDIUM),
                'title' => $lastNews->getTitle(),
                'category_name' => $category->getName(),
                'short_description' => $lastNews->getShortDescription(150),
            ];
        }

        Cache::put('main-page-central-news', $resNews);
        return collect($resNews);
    }

   public function getMainPageBottomNews()
    {
        $setting = app(SettingRepository::class)->getOne(Setting::MAIN_PAGE_BOTTOM_BLOCK_CATEGORY, 'key');
        $categoryIds = explode(",", $setting->value);
        if (!$categoryIds) {
            return [];
        }

        return \App\Models\Category::withCount('news')
            ->having('news_count', '>', 3)->whereIn('slug', $categoryIds)
            ->get();
    }

    public function getMainPageTopNews()
    {
        $setting = $this->settingRepository->getOne(Setting::MAIN_PAGE_TOP_BLOCK_CATEGORY, 'key');
        if (empty($setting->value)) {
            return [];
        }

        if (!$category = $this->categoryRepository->getOne($setting->value, 'slug')) {
            return [];
        }

        return app(NewsRepository::class)->getLastNewsForCategoory($category->id, 3);
    }

    public static function getFooterPageCompany($type)
    {
        $setting = app(SettingRepository::class)->getOne($type, 'key');
        return app(PageRepository::class)->getPageWhereIn(explode( ',', $setting->value));
    }

    public static function getWeatherData()
    {
        if (($value = Cache::get('header-weather-data'))) {
            return $value;
        }

        $weatherData = [];
        $apiKey = env('WEATHER_API_KEY');
        $city = env('WEATHER_API_CITY');
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&lang=uk&appid={$apiKey}";

        try {
            $response = file_get_contents($apiUrl);
            if ($response === FALSE) {
                die('Помилка при отриманні даних');
            }
            $weatherData = json_decode($response, true);

            if ($weatherData && $weatherData['cod'] == 200) {
                $temperature = round($weatherData['main']['temp']);
                $icon = $weatherData['weather'][0]['icon'];
                $iconUrl = "https://openweathermap.org/img/wn/{$icon}@2x.png";
                $weatherData = [
                    'icon' => $iconUrl,
                    'temperature' => $temperature,
                    'city' => 'Львів',
                ];
            }
        } catch (\Throwable $e) {
            // TODO: save to log.
        }

        if ($weatherData) {
            Cache::put('header-weather-data', $weatherData, 1800);
        }

        return $weatherData;
    }

    public static function getTopTags()
    {
        return app(TagRepository::class)->getTopTags();
    }
}
?>
