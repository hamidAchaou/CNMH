<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Member;
use App\Models\User;
use App\Policies\ManagePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Member::class => ManagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('show-btn', function ($user) {
        //     return $user->role === 'member';
        // });
    }
}
