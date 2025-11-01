<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->orderBy('name')->get();

        return view('admin.role_permissions.index', compact('roles'));
    }

    public function edit($role_id)
    {
        // Ambil role
        $role = DB::table('roles')->where('id', $role_id)->first();

        // Ambil semua permissions
        $permissions = DB::table('permissions')->get();

        // Kelompokkan berdasarkan nama modul
        $grouped = [];
        foreach ($permissions as $perm) {
            $parts = explode('_', $perm->name);
            $module = implode('_', array_slice($parts, 0, -1)); // semua kecuali aksi terakhir
            if ($module === '') $module = $parts[0];
            $grouped[$module][] = $perm;
        }

        // Aksi standar
        $actions = ['browse', 'read', 'edit', 'add', 'delete'];

        // Ambil permission yang dimiliki role ini
        $rolePermissions = DB::table('permission_role')
            ->where('role_id', $role_id)
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->pluck('permissions.name')
            ->toArray();

        return view('admin.roles.edit-role-permission', compact(
            'role', 'grouped', 'actions', 'rolePermissions'
        ));
    }

    public function update(Request $request, $role_id)
    {
        $selected = $request->input('permissions', []);

        // Ambil ID permission dari nama
        $permissionIds = DB::table('permissions')
            ->whereIn('name', $selected)
            ->pluck('id')
            ->toArray();

        // Hapus permission lama
        DB::table('permission_role')->where('role_id', $role_id)->delete();

        // Insert permission baru
        $insertData = array_map(fn($pid) => [
            'role_id' => $role_id,
            'permission_id' => $pid
        ], $permissionIds);

        if (!empty($insertData)) {
            DB::table('permission_role')->insert($insertData);
        }

        return redirect()->route('roles.index')->with('success', 'Permission role berhasil diperbarui.');
    }
}
