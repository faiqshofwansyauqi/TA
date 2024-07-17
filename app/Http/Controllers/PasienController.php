<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ibu;
use App\Models\Persalinan;
use App\Models\Show_Anc;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Ibu()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Ibu::class);
            $ibu = Ibu::where('user_id', $user->id)->get();
            return view('pasien.ibu', compact('ibu'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_ibu(Request $request)
    {
        // dd($request);
        $request->validate([
            'nik' => 'required',
            'puskesmas' => 'required',
            'noregis' => 'required',
            'nama_ibu' => 'required',
            'nama_suami' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_domisili' => 'required',
            'desa' => 'required',
            'kab' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaaan_ibu' => 'required',
            'umur' => 'required|integer',
            'rtrw' => 'required',
            'kec' => 'required',
            'prov' => 'required',
            'agama' => 'required',
            'tanggal_reg' => 'required',
            'posyandu' => 'required',
            'nama_kader' => 'required',
            'jamkesmas' => 'required',
            'gol_darah' => 'required',
            'telp' => 'required',
        ]);

        Ibu::create([
            'user_id' => Auth::id(),
            'nik' => $request->nik,
            'puskesmas' => $request->puskesmas,
            'noregis' => $request->noregis,
            'nama_ibu' => $request->nama_ibu,
            'nama_suami' => $request->nama_suami,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_domisili' => $request->alamat_domisili,
            'desa' => $request->desa,
            'kab' => $request->kab,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaaan_ibu' => $request->pekerjaaan_ibu,
            'umur' => $request->umur,
            'rtrw' => $request->rtrw,
            'kec' => $request->kec,
            'prov' => $request->prov,
            'agama' => $request->agama,
            'tanggal_reg' => $request->tanggal_reg,
            'posyandu' => $request->posyandu,
            'nama_kader' => $request->nama_kader,
            'jamkesmas' => $request->jamkesmas,
            'gol_darah' => $request->gol_darah,
            'telp' => $request->telp,
        ]);
        return redirect()->back()->with('success', 'Data ibu berhasil ditambahkan');
    }
    public function getData_ibu()
    {
        $ibu = Ibu::where('user_id', Auth::id())->select('*');
        return DataTables::of($ibu)->make(true);
    }
    public function update_ibu(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'puskesmas' => 'required',
            'noregis' => 'required',
            'nama_ibu' => 'required',
            'nama_suami' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_domisili' => 'required',
            'desa' => 'required',
            'kab' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaaan_ibu' => 'required',
            'umur' => 'required|integer',
            'rtrw' => 'required',
            'kec' => 'required',
            'prov' => 'required',
            'agama' => 'required',
            'tanggal_reg' => 'required',
            'posyandu' => 'required',
            'nama_kader' => 'required',
            'jamkesmas' => 'required',
            'gol_darah' => 'required',
            'telp' => 'required',
        ]);

        $ibu = Ibu::findOrFail($id);
        $ibu->update([
            'nik' => $request->nik,
            'puskesmas' => $request->puskesmas,
            'noregis' => $request->noregis,
            'nama_ibu' => $request->nama_ibu,
            'nama_suami' => $request->nama_suami,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_domisili' => $request->alamat_domisili,
            'desa' => $request->desa,
            'kab' => $request->kab,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaaan_ibu' => $request->pekerjaaan_ibu,
            'umur' => $request->umur,
            'rtrw' => $request->rtrw,
            'kec' => $request->kec,
            'prov' => $request->prov,
            'agama' => $request->agama,
            'tanggal_reg' => $request->tanggal_reg,
            'posyandu' => $request->posyandu,
            'nama_kader' => $request->nama_kader,
            'jamkesmas' => $request->jamkesmas,
            'gol_darah' => $request->gol_darah,
            'telp' => $request->telp,
        ]);

        return redirect()->back()->with('success', 'Data ibu berhasil diperbaharui');
    }
    public function edit_ibu($id)
    {
        $ibu = Ibu::findOrFail($id);
        return response()->json($ibu);
    }

    //////////// ANAK ////////////
    public function Anak()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Anak::class);
            $ibus = Persalinan::with('ibu')->where('user_id', $user->id)->get();
            return view('pasien.anak', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function getInfo_ibu($id_ibu)
    {
        $ibu = Ibu::where('id_ibu', $id_ibu)->first();
        if ($ibu) {
            $persalinan = Persalinan::where('id_ibu', $ibu->id_ibu)->first();
            $show_anc = Show_Anc::where('id_ibu', $ibu->id_ibu)->first();
            return response()->json([
                'ibu' => $ibu,
                'persalinan' => $persalinan,
                'show_anc' => $show_anc,
            ]);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }

    public function store_anak(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_anak' => 'required',
            'id_ibu' => 'required',
            'nama_suami' => 'required',
            'alamat' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_kelahiran' => 'required',
            'anak_ke' => 'required',
            'berat_bayi' => 'required',
            'panjang_bayi' => 'required',
            'bayi_lahir' => 'required',
            'tempat' => 'required',
        ]);

        Anak::create([
            'user_id' => Auth::id(),
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'nama_suami' => $request->nama_suami,
            'alamat' => $request->alamat,
            'kec' => $request->kec,
            'kab' => $request->kab,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_kelahiran' => $request->jenis_kelahiran,
            'anak_ke' => $request->anak_ke,
            'berat_bayi' => $request->berat_bayi,
            'panjang_bayi' => $request->panjang_bayi,
            'bayi_lahir' => $request->bayi_lahir,
            'tempat' => $request->tempat,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function update_anak(Request $request, $id)
    {
        $request->validate([
            'nama_anak' => 'required',
            'id_ibu' => 'required',
            'nama_suami' => 'required',
            'alamat' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_kelahiran' => 'required',
            'anak_ke' => 'required',
            'berat_bayi' => 'required',
            'panjang_bayi' => 'required',
            'bayi_lahir' => 'required',
            'tempat' => 'required',
        ]);
        $anak = Anak::findOrFail($id);
        $anak->update([
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'nama_suami' => $request->nama_suami,
            'alamat' => $request->alamat,
            'kec' => $request->kec,
            'kab' => $request->kab,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_kelahiran' => $request->jenis_kelahiran,
            'anak_ke' => $request->anak_ke,
            'berat_bayi' => $request->berat_bayi,
            'panjang_bayi' => $request->panjang_bayi,
            'bayi_lahir' => $request->bayi_lahir,
            'tempat' => $request->tempat,
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
        try {
            $anak = Anak::findOrFail($id_anak);
            $anak->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }
    public function getData_anak()
    {
        $anak = Anak::where('user_id', Auth::id())->select('*');

        return DataTables::of($anak)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }
}
