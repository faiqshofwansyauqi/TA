<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ibu;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function Ibu()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan', 'Admin'])) {
            $this->authorize('akses_page', Ibu::class);
            $ibu = Ibu::all();
            return view('pasien.ibu', compact('ibu'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function store_ibu(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'puskesmas' => 'required',
            'noregis' => 'required',
            'nama_ibu' => 'required',
            'nama_suami' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_domisili' => 'required',
            'desa' => 'required',
            'kab' => 'required',
            'pendidikan_ibu_suami' => 'required',
            'pekerjaaan_ibu_suami' => 'required',
            'umur' => 'required|integer',
            'rtrw' => 'required',
            'kec' => 'required',
            'prov' => 'required',
            'agama' => 'required',
            'tanggal_reg' => 'required',
            'posyandu' => 'required',
            'nama_kader' => 'required',
            'nama_dukum' => 'required',
            'jamkesmas' => 'required',
            'gol_darah' => 'required',
            'telp' => 'required',
        ]);

        Ibu::create([
            'NIK' => $request->NIK,
            'puskesmas' => $request->puskesmas,
            'noregis' => $request->noregis,
            'nama_ibu' => $request->nama_ibu,
            'nama_suami' => $request->nama_suami,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_domisili' => $request->alamat_domisili,
            'desa' => $request->desa,
            'kab' => $request->kab,
            'pendidikan_ibu_suami' => $request->pendidikan_ibu_suami,
            'pekerjaaan_ibu_suami' => $request->pekerjaaan_ibu_suami,
            'umur' => $request->umur,
            'rtrw' => $request->rtrw,
            'kec' => $request->kec,
            'prov' => $request->prov,
            'agama' => $request->agama,
            'tanggal_reg' => $request->tanggal_reg,
            'posyandu' => $request->posyandu,
            'nama_kader' => $request->nama_kader,
            'nama_dukum' => $request->nama_dukum,
            'jamkesmas' => $request->jamkesmas,
            'gol_darah' => $request->gol_darah,
            'telp' => $request->telp,
        ]);


        return redirect()->back()->with('success', 'Data ibu berhasil ditambahkan');
    }

    public function getData_ibu()
    {
        $ibu = Ibu::select('*');

        return DataTables::of($ibu)->make(true);
    }

    public function update_ibu(Request $request, $NIK)
    {
        $request->validate([
            'puskesmas' => 'required',
            'noregis' => 'required',
            'nama_ibu' => 'required',
            'nama_suami' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_domisili' => 'required',
            'desa' => 'required',
            'kab' => 'required',
            'pendidikan_ibu_suami' => 'required',
            'pekerjaaan_ibu_suami' => 'required',
            'umur' => 'required|integer',
            'rtrw' => 'required',
            'kec' => 'required',
            'prov' => 'required',
            'agama' => 'required',
            'tanggal_reg' => 'required',
            'posyandu' => 'required',
            'nama_kader' => 'required',
            'nama_dukum' => 'required',
            'jamkesmas' => 'required',
            'gol_darah' => 'required',
            'telp' => 'required',
        ]);

        $ibu = Ibu::findOrFail($NIK);
        $ibu->update([
            'puskesmas' => $request->puskesmas,
            'noregis' => $request->noregis,
            'nama_ibu' => $request->nama_ibu,
            'nama_suami' => $request->nama_suami,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_domisili' => $request->alamat_domisili,
            'desa' => $request->desa,
            'kab' => $request->kab,
            'pendidikan_ibu_suami' => $request->pendidikan_ibu_suami,
            'pekerjaaan_ibu_suami' => $request->pekerjaaan_ibu_suami,
            'umur' => $request->umur,
            'rtrw' => $request->rtrw,
            'kec' => $request->kec,
            'prov' => $request->prov,
            'agama' => $request->agama,
            'tanggal_reg' => $request->tanggal_reg,
            'posyandu' => $request->posyandu,
            'nama_kader' => $request->nama_kader,
            'nama_dukum' => $request->nama_dukum,
            'jamkesmas' => $request->jamkesmas,
            'gol_darah' => $request->gol_darah,
            'telp' => $request->telp,
        ]);

        return redirect()->back()->with('success', 'Data ibu berhasil diperbaharui');
    }

    public function edit_ibu($NIK)
    {
        $ibu = Ibu::findOrFail($NIK);
        return response()->json($ibu);
    }

    public function destroy_ibu($NIK)
    {
        $ibu = Ibu::findOrFail($NIK);
        $ibu->delete();

        return redirect()->back()->with('success', 'Data ibu berhasil dihapus');
    }

    //////////// ANAK ////////////
    public function Anak()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan', 'Admin'])) {
            $this->authorize('akses_page', Anak::class);
            $anak = Anak::all();
            $ibus = Ibu::all();
            return view('pasien.anak', compact('anak', 'ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function store_anak(Request $request)
    {
        $request->validate([
            'tanggal_terdaftar' => 'required',
            'nama_anak' => 'required',
            'id_ibu' => 'required',
            'usia_anak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'gol_darah' => 'required',
        ]);

        Anak::create([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'usia_anak' => $request->usia_anak,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
            'gol_darah' => $request->gol_darah,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }

    public function update_anak(Request $request, $id)
    {
        $request->validate([
            'tanggal_terdaftar' => 'required',
            'nama_anak' => 'required',
            'id_ibu' => 'required',
            'usia_anak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'gol_darah' => 'required',
        ]);
        $anak = Anak::findOrFail($id);
        $anak->update([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_anak' => $request->nama_anak,
            'usia_anak' => $request->usia_anak,
            'id_ibu' => $request->id_ibu,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
            'gol_darah' => $request->gol_darah,
        ]);
        return redirect()->back()->with('success', 'Data anak berhasil diupdate');
    }
    public function edit_anak($id_anak)
    {
        $anak = Anak::findOrFail($id_anak);
        return response()->json($anak);
    }
    public function destroy_anak($id_anak)
    {
        $anak = Anak::findOrFail($id_anak);
        $anak->delete();

        return redirect()->back()->with('success', 'Data anak berhasil dihapus');
    }
    public function getData_anak()
    {
        $anak = Anak::select('*');

        return DataTables::of($anak)->make(true);
    }
}
