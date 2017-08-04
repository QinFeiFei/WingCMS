<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\User;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginListener
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
     * @param  LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        $user = User::find($event->user->user_id);

        // 更新用户 { 最后登陆时间 / IP / 登陆次数 }
        $user->last_login = Carbon::now();
        $user->last_ip    = request()->getClientIp();
        $user->login_num  = $user->login_num + 1;
        $user->save();
    }
}
