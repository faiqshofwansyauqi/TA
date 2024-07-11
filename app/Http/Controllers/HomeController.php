<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use App\Models\Anak;
use App\Models\KMS;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jumlahIbu = Ibu::where('user_id', $user->id)->count();
        $jumlahAnak = Anak::where('user_id', $user->id)->count();
        $jumlahKms = KMS::where('user_id', $user->id)->count();
        $jumlahBidan = User::whereHas('roles', function ($query) {
            $query->where('name', 'Bidan');
        })->count();
        $jumlahAdmin = User::whereHas('roles', function ($query) {
            $query->where('name', 'Admin');
        })->count();
        $jumlahKepala = User::whereHas('roles', function ($query) {
            $query->where('name', 'IBI / Puskesmas');
        })->count();
        return view('dashboard.index', compact('jumlahAnak', 'jumlahIbu', 'jumlahKms', 'jumlahBidan', 'jumlahAdmin', 'jumlahKepala'));
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
