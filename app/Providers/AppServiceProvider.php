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

        Gate::define('view-activity-log', function ($user) {
            dd($user->roles); 
            return $user->hasRole('super-admin'); // Pastikan pengguna memiliki peran 'super-admin'
        });

        Gate::define('admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('super-admin', function (User $user) {
            return $user->role == 'super admin';
        });

        Gate::define('pimpinan-jurusan', function (User $user) {
            return $user->role == 'pimpinan jurusan';
        });

        Gate::define('pimpinan-prodi', function (User $user) {
            return $user->role == 'pimpinan program studi';
        });

        Gate::define('dosen-pengampu', function (User $user) {
            return $user->role == 'dosen pengampu';
        });

        Gate::define('pengurus-kbk', function (User $user) {
            return $user->role == 'pengurus kbk';
        });

        Gate::define('access-admin-routes', function ($user) {
            return $user->role == 'admin' || $user->role == 'dosen pengampu';
        });

        Gate::define('access-dosen-routes', function ($user) {
            return $user->role == 'dosen pengampu' || $user->role == 'pengurus kbk';
        });

        Gate::define('access-petinggi-routes', function ($user) {
            return $user->role == 'pengurus kbk' || $user->role == 'pimpinan program studi' || $user->role == 'dosen pengampu' || $user->role == 'pimpinan jurusan';
        });
    }
}
