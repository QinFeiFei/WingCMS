<?php

namespace App\Listeners;

use App\Events\PhoneUpdateEvent;
use App\Services\Message\EmailMessageService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PhoneUpdateListener
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
     * @param  PhoneUpdateEvent  $event
     * @return void
     */
    public function handle(PhoneUpdateEvent $event)
    {
        //$user = $event->user;
        //if($user->email){
        //    $email = new EmailMessageService('bindPhoneSucc', $user->email);
        //    $email->send();
        //}
    }
}
