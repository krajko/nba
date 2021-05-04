<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Team;
use Illuminate\Support\Facades\View;

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
        $teamsWithNews = Team::whereHas('news')->get();
        View::share('teamsWithNews', $teamsWithNews);
    }
}
