<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class SettingController extends Controller
{
    public function Role()
    {
        $roles = Role::all();
        return view('setting.role', compact('roles'));
    }

    public function getData_role(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->select('users.*');
            return DataTables::of($data)
                ->addColumn('roles', function ($row) {
                    $roles = $row->roles->pluck('name')->toArray();
                    return implode(', ', $roles);
                })
                ->make(true);
        }
    }
    public function store_role(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'roles' => 'required|array',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->assignRole($request->roles);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');

    }
    public function edit_role($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return response()->json($user);
    }
    public function update_role(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6', // Password bisa kosong jika tidak diubah
            'roles' => 'required|array',
        ]);

        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email']);

        // Update password jika ada input baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Assign roles baru
        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function destroy_role($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->forceDelete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }

}
