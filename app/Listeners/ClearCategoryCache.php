<?php

namespace App\Listeners;

use App\Events\CategoryChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ClearCategoryCache
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
    public function handle(CategoryChanged $event): void
    {
        Cache::forget('main-menu');
        Cache::forget('popup-menu');
    }
}
