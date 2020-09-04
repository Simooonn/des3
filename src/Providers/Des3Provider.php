<?php

namespace HashyooDes3\Providers;

use HashyooDes3\DES3;
use Illuminate\Support\ServiceProvider;

class Des3Provider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $path = realpath(__DIR__ . '/../../config/config.php');
        $this->publishes([$path => config_path('hashyoo-des3.php')], 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 在容器中注册
        $this->app->singleton('DES3', function () {
            $key = config('hashyoo-des3.DES3_KEY');
            $iv  = config('hashyoo-des3.DES3_IV');
            return new DES3($key, $iv);
        });
    }
}
