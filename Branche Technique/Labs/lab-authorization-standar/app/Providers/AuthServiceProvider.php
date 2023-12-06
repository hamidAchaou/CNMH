<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('index-tasks', function (User $user) {
            return $user->role == 'project-leader' || $user->role == 'member';
        });
        
        Gate::define('show-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('create-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('store-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('edit-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('update-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('destroy-tasks', function (User $user) {
            return $user->role == 'project-leader';
        });

        // projects
        Gate::define('index-projects', function (User $user) {
            return $user->role == 'project-leader';
        });
        Gate::define('show-projects', function (User $user) {
            return $user->role == 'project-leader';
        });
    }
}
