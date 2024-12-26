<?php

namespace App\Providers;

use App\Events\CategoryChanged;
use App\Events\NewsChanged;
use App\Events\PageChanged;
use App\Events\SettingChanged;
use App\Listeners\ClearHeaderCache;
use App\Listeners\ClearMenuCache;
use App\Listeners\ClearNewsCache;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CategoryChanged::class => [
            ClearMenuCache::class,
        ],
        PageChanged::class => [
            ClearMenuCache::class,
        ],
        NewsChanged::class => [
            ClearNewsCache::class,
        ],
        SettingChanged::class => [
            ClearNewsCache::class,
            ClearMenuCache::class,
            ClearHeaderCache::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
