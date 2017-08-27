<?php

namespace App\Listeners;

use App\Events\WatchTvEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WatchTvListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WatchTvEvent  $event
     * @return void
     */
    public function handle(WatchTvEvent $event)
    {
        //
    }
}
