<?php

namespace App\CMS\Listeners;

use App\CMS\Events\CacheCleared;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReCaching implements ShouldQueue
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
     *
     * @param  CacheCleared  $event
     * @return void
     */
    public function handle(CacheCleared $event)
    {
        try {
            if ($urls = isset_not_empty($event->urls)) {
                array_walk($urls, 'url_exists');
            }
        } catch (\Exception $exception) {}
    }
}
