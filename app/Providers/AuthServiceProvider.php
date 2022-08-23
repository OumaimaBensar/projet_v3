<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('logged_in', function($user){
            return $user; // if there is no logged in user it will return null 
        });

        Gate::define('is-admin', function($user){
            return $user->hasAnyRole('admin'); 
        });

        Gate::define('is-redacteur', function($user){
            return $user->hasAnyRole('saisi'); 
        });

        Gate::define('is-validator', function($user){
            return $user->hasAnyRole('validation'); 
        });

        Gate::define('is-MissionManager', function($user){
            return $user->hasAnyRole('G_Mission'); 
        });

    }
}
