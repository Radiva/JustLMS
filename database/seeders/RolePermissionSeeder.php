<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default roles
        DB::table('roles')->insert([
            ['name' => 'admin', 'label' => 'Administrator'],
            ['name' => 'guru', 'label' => 'Guru'],
            ['name' => 'siswa', 'label' => 'Siswa'],
        ]);

        // Default permissions (bisa berkembang nanti)
        DB::table('permissions')->insert([
            ['name' => 'users_browse', 'label' => 'Akses Pengguna'],
            ['name' => 'users_read', 'label' => 'Detail Pengguna'],
            ['name' => 'users_edit', 'label' => 'Edit Pengguna'],
            ['name' => 'users_add', 'label' => 'Tambah Pengguna'],
            ['name' => 'users_delete', 'label' => 'Hapus Pengguna'],
            ['name' => 'roles_browse', 'label' => 'Akses Role'],
            ['name' => 'roles_read', 'label' => 'Detail Role'],
            ['name' => 'roles_edit', 'label' => 'Edit Role'],
            ['name' => 'roles_add', 'label' => 'Tambah Role'],
            ['name' => 'roles_delete', 'label' => 'Hapus Role'],
            ['name' => 'permissions_browse', 'label' => 'Akses Permission'],
            ['name' => 'permissions_read', 'label' => 'Detail Permission'],
            ['name' => 'permissions_edit', 'label' => 'Edit Permission'],
            ['name' => 'permissions_add', 'label' => 'Tambah Permission'],
            ['name' => 'permissions_delete', 'label' => 'Hapus Permission'],
            ['name' => 'role_permissions_browse', 'label' => 'Akses Role Permission'],
            ['name' => 'role_permissions_read', 'label' => 'Detail Role Permission'],
            ['name' => 'role_permissions_edit', 'label' => 'Edit Role Permission'],
            ['name' => 'role_permissions_add', 'label' => 'Tambah Role Permission'],
            ['name' => 'role_permissions_delete', 'label' => 'Hapus Role Permission'],
            ['name' => 'dashboard_browse', 'label' => 'Akses Dashboard'],
            
        ]);

        // Role admin mendapatkan semua permission
        $adminRole = DB::table('roles')->where('name', 'admin')->first();
        $permissions = DB::table('permissions')->pluck('id')->toArray();

        foreach ($permissions as $pid) {
            DB::table('permission_role')->insert([
                'permission_id' => $pid,
                'role_id' => $adminRole->id,
            ]);
        }

        // User #1 jadi admin default
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => $adminRole->id,
        ]);
    }
}
