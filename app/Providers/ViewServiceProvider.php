<?php

namespace App\Providers;

use App\View\Composers\NavComposer;
use App\View\Composers\SliderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.nav-header', NavComposer::class);
        View::composer('home.components.slider', SliderComposer::class);
    }
}
