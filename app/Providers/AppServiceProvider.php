<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::pluck('value', 'key')->toArray(); // collection to array format

        // shares this in all of view blade files (*), than to a specific view-file only
        View::composer('*', function($view) use ($setting){
            $view->with('settings', $setting);
        });
    }
}
