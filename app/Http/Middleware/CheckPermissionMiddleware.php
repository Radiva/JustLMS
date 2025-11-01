<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil dari session
        $permissions = Session::get('user_permissions');

        // Jika belum ada di session, ambil ulang dan cache
        if (!$permissions) {
            $roles = DB::table('user_roles')
                ->where('user_id', $user->id)
                ->pluck('role_id');

            $permissions = DB::table('permission_role')
                ->whereIn('role_id', $roles)
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->pluck('permissions.name')
                ->toArray();

            Session::put('user_permissions', $permissions);
        }

        // Ambil nama route saat ini, contoh: siswa.index, guru.store, role.destroy
        $routeName = Route::currentRouteName();

        if (!$routeName) {
            return $next($request);
        }
        
        // Pisahkan nama route menjadi modul dan aksi
        $parts = explode('.', $routeName);
        $module = $parts[0] ?? null;
        $action = $parts[1] ?? null;

        if (!$module || !$action) {
            return $next($request);
        }

        // Mapping aksi route ke permission BREAD
        $map = [
            'index'   => 'browse',
            'show'    => 'read',
            'create'  => 'add',
            'store'   => 'add',
            'edit'    => 'edit',
            'update'  => 'edit',
            'destroy' => 'delete',
        ];

        // Konversi dari kebab-case → snake_case
        $module = str_replace('-', '_', $module);
        
        $bread = $map[$action] ?? null;

        if ($bread) {
            $permissionName = "{$module}_{$bread}";

            if (!in_array($permissionName, $permissions)) {
                abort(403, 'Anda tidak memiliki izin untuk ' . strtoupper($bread) . ' pada modul ini.');
            }
        }

        return $next($request);
    }
}
