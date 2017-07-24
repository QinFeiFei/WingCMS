<?php

namespace App\Providers;

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
    }
}
