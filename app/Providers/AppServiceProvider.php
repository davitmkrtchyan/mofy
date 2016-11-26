<?php

namespace App\Providers;

use App\Services\ApiClientService;
use App\Services\SearchService;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apiClientService', function () {
            return new ApiClientService();
        });

        $this->app->singleton('searchService', function () {
            return new SearchService();
        });
    }
}
