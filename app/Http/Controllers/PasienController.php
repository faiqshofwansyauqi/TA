<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ibu;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function Ibu()
    {
        $ibu = Ibu::all();
        return view('pasien.ibu', compact('ibu'));
    }

    public function store_ibu(Request $request)
    {

        $request->validate([
            'tanggal_terdaftar' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'usia_ibu' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomer_telepon' => 'required',
            'gol_darah' => 'required',
        ]);

        $tempat_tanggal_lahir = $request->tempat_lahir . ', ' . $request->tanggal_lahir;

        Ibu::create([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_ibu' => $request->nama_ibu,
            'alamat' => $request->alamat,
            'usia_ibu' => $request->usia_ibu,
            'tempat_tanggal_lahir' => $tempat_tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomer_telepon' => $request->nomer_telepon,
            'gol_darah' => $request->gol_darah,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }

    public function getData_ibu()
    {
        $ibu = Ibu::select('*');

        return DataTables::of($ibu)->make(true);
    }

    public function update_ibu(Request $request, $id)
    {
        $request->validate([
            'tanggal_terdaftar' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'usia_ibu' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomer_telepon' => 'required',
            'gol_darah' => 'required',
        ]);
        $tempat_tanggal_lahir = $request->tempat_lahir . ', ' . $request->tanggal_lahir;
        $ibu = Ibu::findOrFail($id);
        $ibu->update([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_ibu' => $request->nama_ibu,
            'alamat' => $request->alamat,
            'usia_ibu' => $request->usia_ibu,
            'tempat_tanggal_lahir' => $tempat_tanggal_lahir,
            'nomer_telepon' => $request->nomer_telepon,
            'gol_darah' => $request->gol_darah,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil diupdate');
    }

    public function edit_ibu($id_ibu)
    {
        $ibu = Ibu::findOrFail($id_ibu);
        return response()->json($ibu);
    }

    public function destroy_ibu($id_ibu)
    {
        $ibu = Ibu::findOrFail($id_ibu);
        $ibu->delete();

        return redirect()->back()->with('success', 'Data anak berhasil dihapus');
    }

    ////// ANAK //////
    public function Anak()
    {
        $anak = Anak::all();
        return view('pasien.anak', compact('anak'));
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

        $tempat_tanggal_lahir = $request->tempat_lahir . ', ' . $request->tanggal_lahir;

        Anak::create([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'usia_anak' => $request->usia_anak,
            'tempat_tanggal_lahir' => $tempat_tanggal_lahir,
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
        $tempat_tanggal_lahir = $request->tempat_lahir . ', ' . $request->tanggal_lahir;
        $anak = Anak::findOrFail($id);
        $anak->update([
            'tanggal_terdaftar' => $request->tanggal_terdaftar,
            'nama_anak' => $request->nama_anak,
            'usia_anak' => $request->usia_anak,
            'id_ibu' => $request->id_ibu,
            'tempat_tanggal_lahir' => $tempat_tanggal_lahir,
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
    public function showAnakPage()
    {
        $ibus = Ibu::all();
        return view('pasien.anak')->with('ibus', $ibus);
    }
}
