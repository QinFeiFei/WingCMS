<?php

namespace App\Providers;

use App\Services\Message\Message;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->extendValidator();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 反向创建migration
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }

        // Ide Helper
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }


    /**
     * 扩展Validate验证规则
     *
     */
    private function extendValidator() {
        // 添加手机号验证
        Validator::extend('mobile', function($attribute, $value, $parameters, $validator) {
            return isMobile($value);
        });

        // 添加身份证验证
        Validator::extend('idCard', function($attribute, $value, $parameters, $validator) {
            return isIdCardNo($value);
        });

        // 验证码是否正确
        Validator::extend('msgcode', function($attribute, $value, $parameters) {
            $send_type = $parameters[0];
            $content_type = $parameters[1];
            $code = $parameters[2];
            $send_from = $parameters[3];

            $message = new Message($content_type, $send_from);
            if( ! $message->checkCode($code, $send_type) ){
                return false;
            }else{
                return true;
            }
        }, '验证码错误.');
    }
}
