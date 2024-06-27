<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use App\Models\Anak;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahIbu = Ibu::count();
        $jumlahAnak = Anak::count();
        return view('dashboard.index', compact('jumlahAnak', 'jumlahIbu'));
    }
    public function profile($id)
    {
        $user = User::find($id);
        return view('dashboard.profile', compact('user'));
    }
    public function profile_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email']);
        
        $user->update($data);
        // dd($request);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function ERROR()
    {
        return view('errors.404');
    }

}
