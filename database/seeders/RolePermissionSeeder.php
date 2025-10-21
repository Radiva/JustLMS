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
            ['name' => 'manage_users', 'label' => 'Kelola Pengguna'],
            ['name' => 'manage_roles', 'label' => 'Kelola Role'],
            ['name' => 'view_dashboard', 'label' => 'Akses Dashboard'],
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
