<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PrefectureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $prefecture = \App::make(\App\Prefecture::class);
        view()->composer('works.form', function ($view) use ($prefecture) {
            $view->with(['prefectures' => $prefecture->all()]);
        });
        view()->composer('works.folders', function ($view) use ($prefecture) {
            $view->with(['prefectures' => $prefecture->all()]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
