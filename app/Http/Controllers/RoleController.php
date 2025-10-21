<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);
        DB::table('roles')->insert([
            'name' => $request->name,
            'label' => $request->label,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan');
    }

    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|unique:roles,name,'.$id]);
        DB::table('roles')->where('id', $id)->update([
            'name' => $request->name,
            'label' => $request->label,
            'updated_at' => now(),
        ]);
        return redirect()->route('roles.index')->with('success', 'Role diperbarui');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success', 'Role dihapus');
    }
}
