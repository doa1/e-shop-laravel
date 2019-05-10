<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('can-create-product',function ($user)
        {
            return $user->hasPermission('can-create-product');
        });
        Gate::define('can-update-product',function($user){
            return $user->hasPermission('can-update-product');
        });
        Gate::define('can-delete-product',function($user){
            return $user->hasPermission('can-delete-product');
        });
        //
    }
}
