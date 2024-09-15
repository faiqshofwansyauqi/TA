<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Admin()
    {
        $user = Auth::user();
        if ($user->hasRole(['Admin'])) {
            $this->authorize('akses_page', Role::class);
            $roles = Role::all();
            return view('setting.admin', compact('roles'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function Bidan()
    {
        $user = Auth::user();
        if ($user->hasRole(['Admin'])) {
            $this->authorize('akses_page', Role::class);
            $roles = Role::all();
            return view('setting.bidan', compact('roles'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function IBI_Puskesmas()
    {
        $user = Auth::user();
        if ($user->hasRole(['Admin'])) {
            $this->authorize('akses_page', Role::class);
            $roles = Role::all();
            return view('setting.ibi_puskesmas', compact('roles'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function getData_admin(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', 'Admin');
            })->with('roles')->select('users.*');

            return DataTables::of($data)
                ->addColumn('roles', function ($row) {
                    $roles = $row->roles->pluck('name')->toArray();
                    return implode(', ', $roles);
                })
                ->make(true);
        }
    }
    public function getData_bidan(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', 'Bidan');
            })->with('roles')->select('users.*');

            return DataTables::of($data)
                ->addColumn('roles', function ($row) {
                    $roles = $row->roles->pluck('name')->toArray();
                    return implode(', ', $roles);
                })
                ->make(true);
        }
    }
    public function getData_ibi_puskesmas(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['Puskesmas', 'IBI']);
            })->with('roles')->select('users.*');

            return DataTables::of($data)
                ->addColumn('roles', function ($row) {
                    // Ambil semua roles dan gabungkan dengan koma
                    $roles = $row->roles->pluck('name')->toArray();
                    return implode(', ', $roles);
                })
                ->make(true);
        }
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|array',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole($request->roles);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function edit_user($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return response()->json($user);
    }
    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'roles' => 'required|array',
        ]);

        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function destroy_user($id)
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
