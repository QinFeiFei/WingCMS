<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 用户登陆
        'App\Events\LoginEvent' => [
            'App\Listeners\LoginListener',
        ],

        // 用户注册
        'App\Events\RegisterEvent' => [
            'App\Listeners\RegisterListener',
        ],

        // 用户修改密码
        'App\Events\PassWordUpdateEvent' => [
            'App\Listeners\PassWordUpdateListener',
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
