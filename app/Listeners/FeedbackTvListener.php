<?php

namespace App\Listeners;

use App\Events\FeedbackTvEvent;
use App\Services\Message\EmailMessageService;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackTvListener
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
     * @param  FeedbackTvEvent  $event
     * @return void
     */
    public function handle(FeedbackTvEvent $event)
    {
        $user = User::find($event->user_id);
        if($user->email){
            $email = new EmailMessageService('tvFeedback', $user->email);
            $email->send();
        }
    }
}
