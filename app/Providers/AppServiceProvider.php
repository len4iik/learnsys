<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Chapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.inner', function($view)
        {
            $chapters = Chapter::orderBy('field', 'asc')->get();
            //$chapters = Chapter::all();
            $view->with('chapters', $chapters);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
