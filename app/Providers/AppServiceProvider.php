<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {

        PaginationPaginator::useBootstrapFive();

        $this->registerPolicies();

        Gate::define('super-admin', function (User $user) {
            return $user->role;
        });

        Gate::define('admin', function (User $user) {
            return $user->role;
        });


        Gate::define('pimpinan-jurusan', function (User $user) {
            return $user->role;
        });

        Gate::define('pimpinan-prodi', function (User $user) {
            return $user->role;
        });

        Gate::define('dosen-pengampu', function (User $user) {
            return $user->role;
        });

        Gate::define('pengurus-kbk', function (User $user) {
            return $user->role;
        });

        Gate::define('dosen-kbk', function (User $user) {
            return $user->role;
        });
    }
}
