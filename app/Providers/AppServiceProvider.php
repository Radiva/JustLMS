<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

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
        Event::listen(Login::class, function ($event) {
            $user = $event->user;

            // Ambil role user
            $roles = DB::table('role_user')
                ->where('user_id', $user->id)
                ->pluck('role_id');

            // Ambil permission berdasarkan role
            $permissions = DB::table('permission_role')
                ->whereIn('role_id', $roles)
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->pluck('permissions.name')
                ->toArray();

            // Simpan ke session
            Session::put('user_permissions', $permissions);
        });

        Event::listen(Logout::class, function ($event) {
            Session::forget('user_permissions');
        });

        Blade::if('perm', function ($permission) {
            $permissions = Session::get('user_permissions', []);
            return in_array($permission, $permissions);
        });
    }
}
