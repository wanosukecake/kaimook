<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;
use Carbon\CarbonImmutable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Report\ReportRepositoryInterface::class,
            \App\Repositories\Report\ReportRepository::class
        );
        $this->app->bind(
            \App\Repositories\Goal\GoalRepositoryInterface::class,
            \App\Repositories\Goal\GoalRepository::class
        );
        Date::use(CarbonImmutable::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
