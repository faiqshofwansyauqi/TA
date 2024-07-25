<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use App\Models\Anak;
use App\Models\KMS;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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
        $user = User::with('roles')->find($id);
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

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
        ]);
        $user = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_photos', $filename, 'public');
            $img = Image::make(storage_path('app/public/profile_photos/' . $filename));
            $img->resize(300, 300);
            $img->save();
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = 'profile_photos/' . $filename;
        }
        $user->save();
        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
    public function delete_profile($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto lama jika ada
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
            $user->profile_photo = null; // Reset ke foto default
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }

    public function ERROR()
    {
        return view('errors.404');
    }

}
