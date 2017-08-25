<?php

namespace App\Listeners;

use App\Events\EmailUpdateEvent;
use App\Services\Message\EmailMessageService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUpdateListener
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
     * @param  EmailUpdateEvent  $event
     * @return void
     */
    public function handle(EmailUpdateEvent $event)
    {
        $user = $event->user;
        if($user->email){
            $email = new EmailMessageService('bindEmailSucc', $user->email);
            $email->send();
        }
    }
}
