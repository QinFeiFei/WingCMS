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

        // 用户绑定邮箱
        'App\Events\EmailUpdateEvent' => [
            'App\Listeners\EmailUpdateListener',
        ],

        // 用户绑定手机号
        'App\Events\PhoneUpdateEvent' => [
            'App\Listeners\PhoneUpdateListener',
        ],

        // 观看影视
        'App\Events\WatchTvEvent' => [
            'App\Listeners\WatchTvListener',
        ],

        // 资源异常已处理
        'App\Events\FeedbackTvEvent' => [
            'App\Listeners\FeedbackTvListener',
        ],

        // 想看的资源已添加
        'App\Events\SeekTvEvent' => [
            'App\Listeners\SeekTvListener',
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
