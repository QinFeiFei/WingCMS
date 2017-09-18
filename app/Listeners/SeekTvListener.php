<?php

namespace App\Listeners;

use App\Events\SeekTvEvent;
use App\Services\Message\EmailMessageService;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SeekTvListener
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
     * @param  SeekTvEvent  $event
     * @return void
     */
    public function handle(SeekTvEvent $event)
    {
        $user = User::find($event->user_id);
        if($user->email){
            $email = new EmailMessageService('tvSeek', $user->email);
            $email->send();
        }
    }
}
