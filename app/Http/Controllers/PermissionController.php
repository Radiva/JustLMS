<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = DB::table('permissions')->get();

        // Kelompokkan permission berdasarkan nama modul (tanpa action)
        $grouped = $permissions->groupBy(function ($perm) {
            $action = substr($perm->name, strrpos($perm->name, '_') + 1);
            // Ambil semua sebelum action terakhir
            return substr($perm->name, 0, -(strlen($action) + 1));
        });

        // Buat daftar unik modul
        $modules = $grouped->keys();

        return view('admin.permissions.index', compact('modules', 'grouped'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|string',
            'actions' => 'required|array'
        ]);

        $module = strtolower($request->name);

        $data = [];
        foreach ($request->actions as $act) {
            $data[] = [
                'name' => "{$module}_{$act}",
                'label' => "{$request->label} ". ucfirst($act),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('permissions')->insert($data);

        return redirect()->route('permissions.index')->with('success', 'Permission BREAD berhasil dibuat');
    }

    public function edit($module)
    {
        // Ambil semua permission dari modul ini
        $permissions = DB::table('permissions')
            ->where('name', 'like', $module . '_%')
            ->pluck('name')
            ->toArray();

        $actions = ['browse', 'read', 'edit', 'add', 'delete'];

        return view('admin.permissions.edit', compact('module', 'permissions', 'actions'));
    }

    public function update(Request $request, $module)
    {
        $actions = ['browse', 'read', 'edit', 'add', 'delete'];

        // Hapus permission lama
        DB::table('permissions')->where('name', 'like', $module . '_%')->delete();

        // Buat ulang permission sesuai checkbox
        foreach ($actions as $action) {
            if ($request->has($action)) {
                DB::table('permissions')->insert([
                    'name' => $module . '_' . $action,
                    'label' => $module . '_' . $action,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('permissions.index')->with('success', 'Permission berhasil diperbarui.');
    }

    public function destroy($module)
    {
        DB::table('permissions')->where('name', 'like', $module . '_%')->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted');
    }
}
