<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Party::class => PartyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // Gate::define('admin_party', function () {
        //     return Auth::user()->is_admin;
        // });

        // Gate::define('create_party', function () {
        //     return Auth::user()->is_admin;
        // });
        
        // Gate::define('edit_party', function () {
        //     return Auth::user()->is_admin;
        // });
        
        // Gate::define('delete_party', function () {
        //     return Auth::user()->is_admin;
        // });
    }
}
