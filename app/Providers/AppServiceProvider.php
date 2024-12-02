<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Space;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        $categories = Category::active()->orderBy('priority','asc')->get();
        view()->share('categories', $categories);

        $information = Setting::first();
        view()->share('information', $information);

        $spaces = Space::active()->orderBy('priority','asc')->get();
        view()->share('spaces', $spaces);

    }
}
