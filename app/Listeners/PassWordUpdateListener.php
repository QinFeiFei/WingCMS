<?php

namespace App\Listeners;

use App\Events\PassWordUpdateEvent;
use App\Services\Message\EmailMessageService;
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
        $user = $event->user;
        if($user->email){
            $email = new EmailMessageService('modPassword', $user->email);
            $email->send();
        }
    }
}
