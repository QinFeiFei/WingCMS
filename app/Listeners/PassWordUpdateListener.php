<?php

namespace App\Listeners;

use App\Events\PassWordUpdateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassWordUpdateListener
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
     * @param  PassWordUpdateEvent  $event
     * @return void
     */
    public function handle(PassWordUpdateEvent $event)
    {
        //
    }
}
