<?php

namespace App\Models;

use App\Services\CategoryServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'params'];

    static $rules = [
        'title' => '',
        'description' => '',
    ];

    const TYPE_INPUT = 1;
    const TYPE_CHECKBOX = 2;
    const TYPE_TEXTAREA = 3;
    const TYPE_SELECT = 4;
    const TYPE_IMAGE = 5;
    const TYPE_MULTIPLE = 6;
    const TYPE_TAGS = 7;
    const TYPE_EDITOR = 8;


    const CATEGORY_GENERAL = 1;
    const CATEGORY_HEADER = 2;
    const CATEGORY_CONTACT = 3;
    const CATEGORY_META = 4;
    const CATEGORY_OTHER = 5;
    const CATEGORY_MAIN_PAGE = 6;
    const CATEGORY_SPECIAL_BLOCK = 7;

    const MENU_OPTION_CATEGORY = 'category';
    const MENU_OPTION_PAGE = 'page';
    const MENU_OPTION_HASH = '#';

    // CATEGORY_SPECIAL_BLOCK
    const SPECIAL_BLOCK_LINK = 'special_block_link';
    const SPECIAL_BLOCK_IMAGE = 'special_block_image';
    // CATEGORY_SPECIAL_BLOCK

    // HEADER
    const HEADER_MAIN_MENU_OPTIONS = 'header_main_menu_options';
    const HEADER_POPUP_MENU_OPTIONS = 'header_popup_menu_options';
    const HEADER_MAIN_MENU_TAGS = 'header_main_menu_tags';
    // HEADER

    // GENERAL
    const MAIN_PAGE_TOP_BLOCK_CATEGORY = 'main_page_top_block_category';
    const MAIN_PAGE_CENTRAL_BLOCK_CATEGORY = 'main_page_central_block_category';
    const MAIN_PAGE_BOTTOM_BLOCK_CATEGORY = 'main_page_bottom_block_category';
    const MAIN_PAGE_TOP_BANNER = 'main_page_top_banner';
    // GENERAL




    const HEADER_IMAGE = 'header_image';
    const SITE_NAME = 'site_name';
    const FOOTER_IMAGE = 'footer_image';
    const HEADER_ITEMS_MENU = 'header_items_menu';
    const HEADER_CATEGORY_MENU = 'header_category_menu';
    const BLOCKS_CATEGORY_HOME_PAGE = 'blocks_cateory_home_page';
    const BLOCKS_PAGE_HOME_PAGE = 'blocks_PAGE_home_page';
    const HEADER_ITEMS_LEFT_MENU = 'header_items_left_menu';

    const FACEBOOK_LINK = 'facebook_link';
    const TWITTER_LINK = 'twitter_link';
    const TELEGRAM_LINK = 'telegram_link';
    const YOUTUBE_LINK = 'youtube_link';
    const INSTAGRAM_LINK = 'instagram_link';
    const TIKTOK_LINK = 'tiktok_link';
    const EMAIL_ADDRESS = 'email_address';

    const PAGE_COMPANY = 'page_company';
    const PAGE_CONTACTS = 'page_contacts';

    //Мета
    const META_TITLE = 'meta_title';
    const META_IMAGE = 'meta_image';
    const META_DESCRIPTION = 'meta_description';
    //Мета

    const ADDRESS = 'address';
    const PHONE = 'phone';
    const OTHER_SCRIPTS = 'other_scripts';

    public function getImageUrl()
    {
        return $this->image ? $this->image->getPath() : '/public/default.png';
    }

    public function image()
    {
        return $this->hasOne(File::class, 'id','value');
    }

    public static function settingsCategory() {
        return [
            self::CATEGORY_MAIN_PAGE => __('Головна сторінка'),
            self::CATEGORY_HEADER => __('Шапка сайту'),
            self::CATEGORY_CONTACT => __('Контактна інформація'),
            self::CATEGORY_META => __('Мета теги'),
            self::CATEGORY_OTHER => __('Інші'),
            self::CATEGORY_SPECIAL_BLOCK => __('Спец. Блок')
        ];
    }

    public static function getSettingsCategory($key)
    {
        $category = self::settingsCategory();

        return array_key_exists($key, $category) ?  $category[$key] : "";
    }

    public static function getStatus($key)
    {
       $setting = Setting::where('key', $key)->first();

        return $setting->type;
    }

    public function getParams()
    {
        switch ($this->key) {
            case self::MAIN_PAGE_CENTRAL_BLOCK_CATEGORY:
            case self::MAIN_PAGE_BOTTOM_BLOCK_CATEGORY:
            case self::HEADER_ITEMS_LEFT_MENU:
            case self::BLOCKS_CATEGORY_HOME_PAGE:
            case self::HEADER_CATEGORY_MENU:
            case self::MAIN_PAGE_TOP_BLOCK_CATEGORY:
                $categories = Category::doesnthave('parent')->with('childrenCategories')->get();
                $categoryService = app(CategoryServices::class);
                return $categoryService->getCategoriesList($categories);
                break;
            case self::PAGE_COMPANY:
            case self::BLOCKS_PAGE_HOME_PAGE:
            case self::PAGE_CONTACTS:
                return Page::active()->pluck('title', 'id')->toArray();
                break;
        }

        return json_decode($this->params);
    }
}
