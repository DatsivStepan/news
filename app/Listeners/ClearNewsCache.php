<?php

namespace App\Listeners;

use App\Events\CategoryChanged;
use App\Services\HomeServices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ClearNewsCache
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        app(HomeServices::class)->getMainPageCentralNews(true);
    }
}
