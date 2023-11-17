<?php

namespace App\Providers;

use App\Repositories\Interface\ProjectInterface;
use App\Repositories\Interface\TaskInterface;
use App\Repositories\RepositoryProject;
use App\Repositories\RepositoryTask;
use Illuminate\Pagination\Paginator;use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectInterface::class, RepositoryProject::class);
        $this->app->bind(TaskInterface::class, RepositoryTask::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
