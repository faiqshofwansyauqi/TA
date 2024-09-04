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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'tgl_lahir' => 'required|date',
            'nip' => 'nullable|string|max:255|regex:/^[0-9,]+$/',
            'alamat' => 'nullable|string|max:500',
        ]);
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email', 'tgl_lahir', 'nip', 'alamat']);
        $user->update($data);
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

            $img = Image::make(storage_path('app/public/' . $path));
            $img->resize(300, 300);
            $img->save();
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $path;
        }
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
    public function delete_profile($id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
            $user->profile_photo = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = Auth::user();
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json(['errors' => ['current_password' => ['Password lama tidak sesuai.']]], 422);
        }
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        Auth::logout();
        return response()->json([
            'success' => 'Password berhasil diperbarui. Anda akan diarahkan ke halaman login.',
            'redirect_url' => route('login')
        ]);
    }

    public function ERROR()
    {
        return view('errors.404');
    }

}
