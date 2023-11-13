<?php

namespace App\Providers;

use App\Repositories\Interfaces\InterfaceMembers;
use App\Repositories\Interfaces\InterfaceProjects;
use App\Repositories\Interfaces\InterfaceTask;
use App\Repositories\membersRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceProjects::class, ProjectRepository::class);
        $this->app->bind(InterfaceTask::class, TaskRepository::class);
        $this->app->bind(InterfaceMembers::class, membersRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
