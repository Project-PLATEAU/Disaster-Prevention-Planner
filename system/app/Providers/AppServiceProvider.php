<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 権限によって閲覧するページを変更する
        // 行政
        Gate::define('gov', function ($user) {
            return ($user->role === 'gov');
        });
        // 自治会
        Gate::define('org', function ($user) {
            return ($user->role === 'org');
        });
        // 住民
        Gate::define('resident', function ($user) {
            return ($user->role == 'member');
        });
    }
}
