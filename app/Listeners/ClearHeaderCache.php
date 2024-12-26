<?php

namespace App\Listeners;

use App\Events\CategoryChanged;
use App\Services\HomeServices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ClearHeaderCache
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
        Cache::forget('main-menu-tags');
        Cache::forget('main-page-top-banner');
    }
}
