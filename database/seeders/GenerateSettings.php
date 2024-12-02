<?php
namespace Database\Seeders;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Database\Seeder;
use App\Enums\RoleEnum;
use Carbon\Carbon;

class GenerateSettings extends Seeder
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $settingsData = [
            //HEADER
            [
                'name' => 'Елементи на "Головному меню"',
                'value' => '',
                'key' => Setting::HEADER_MAIN_MENU_OPTIONS,
                'category' => Setting::CATEGORY_HEADER,
                'type' => Setting::TYPE_TEXTAREA,
                'description' => ''
            ],
            [
                'name' => 'Елементи в "Попап меню"',
                'value' => '',
                'key' => Setting::HEADER_POPUP_MENU_OPTIONS,
                'category' => Setting::CATEGORY_HEADER,
                'type' => Setting::TYPE_TEXTAREA,
                'description' => ''
            ],
            [
                'name' => 'Теги головного меню',
                'value' => '',
                'key' => Setting::HEADER_MAIN_MENU_TAGS,
                'category' => Setting::CATEGORY_HEADER,
                'type' => Setting::TYPE_TAGS,
                'description' => ''
            ],
            //HEADER

            // General
            [
                'name' => 'Категорія верхнього блоку',
                'value' => '',
                'key' => Setting::MAIN_PAGE_TOP_BLOCK_CATEGORY,
                'category' => Setting::CATEGORY_MAIN_PAGE,
                'type' => Setting::TYPE_SELECT,
                'description' => ''
            ],
            [
                'name' => 'Категорії центральний блок',
                'value' => '',
                'key' => Setting::MAIN_PAGE_CENTRAL_BLOCK_CATEGORY,
                'category' => Setting::CATEGORY_MAIN_PAGE,
                'type' => Setting::TYPE_MULTIPLE,
                'description' => ''
            ],
            [
                'name' => 'Категорії нижній блок',
                'value' => '',
                'key' => Setting::MAIN_PAGE_BOTTOM_BLOCK_CATEGORY,
                'category' => Setting::CATEGORY_MAIN_PAGE,
                'type' => Setting::TYPE_MULTIPLE,
                'description' => ''
            ],
            [
                'name' => 'Верхній блок "Банер"',
                'value' => '',
                'key' => Setting::MAIN_PAGE_TOP_BANNER,
                'category' => Setting::CATEGORY_MAIN_PAGE,
                'type' => Setting::TYPE_EDITOR,
                'description' => ''
            ],
            // General

            // МЕТА
            [
                'name' => 'Мета Title',
                'value' => '',
                'key' => Setting::META_TITLE,
                'category' => Setting::CATEGORY_META,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Мета Description',
                'value' => '',
                'key' => Setting::META_DESCRIPTION,
                'category' => Setting::CATEGORY_META,
                'type' => Setting::TYPE_TEXTAREA,
                'description' => ''
            ],
            [
                'name' => 'Мета Image',
                'value' => '',
                'key' => Setting::META_IMAGE,
                'category' => Setting::CATEGORY_META,
                'type' => Setting::TYPE_IMAGE,
                'description' => ''
            ],
            // МЕТА

            // Contact
            [
                'name' => 'Наш Адрес',
                'value' => '',
                'key' => Setting::ADDRESS,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Email',
                'value' => '',
                'key' => Setting::EMAIL_ADDRESS,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш номер телефону',
                'value' => '',
                'key' => Setting::PHONE,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Facebook',
                'value' => '',
                'key' => Setting::FACEBOOK_LINK,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Twitter',
                'value' => '',
                'key' => Setting::TWITTER_LINK,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Telegram',
                'value' => '',
                'key' => Setting::TELEGRAM_LINK,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Youtube',
                'value' => '',
                'key' => Setting::YOUTUBE_LINK,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            [
                'name' => 'Наш Instagram',
                'value' => '',
                'key' => Setting::INSTAGRAM_LINK,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_INPUT,
                'description' => ''
            ],
            // Contact


            // CATEGORY_OTHER
            [
                'name' => 'Додаткові скріпти. Підключення сторонніх сервісів.',
                'value' => '',
                'key' => Setting::OTHER_SCRIPTS,
                'category' => Setting::CATEGORY_CONTACT,
                'type' => Setting::TYPE_TEXTAREA,
                'description' => ''
            ],
            // CATEGORY_OTHER
        ];

        foreach ($settingsData as $settingData) {
            $setting = $this->settingRepository->getOne($settingData['key'], 'key');
            if (!$setting) {
                $this->settingRepository->create($settingData);
            } else {
                $setting = $this->settingRepository->getOneOrFail($setting->id);
                unset($settingData['value']);
                $this->settingRepository->update($setting, $settingData);
            }
        }
    }
}
