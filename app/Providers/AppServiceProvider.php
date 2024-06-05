<?php

namespace App\Providers;

use App\Interfaces\ArticleRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleService::class, function ($app) {
            return new ArticleService($app->make(ArticleRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
