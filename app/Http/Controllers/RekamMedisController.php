<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Ibu;
use App\Models\Ropb;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
{
    //////// PERSALINAN ////////
    public function Persalinan()
    {
        $persalinan = Persalinan::all();
        return view('rekam_medis.persalinan', compact('persalinan'));
    }
    public function store_persalinan(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_ibu' => 'required',
            'kala1' => 'required',
            'kala2' => 'required',
            'bayi_lahir' => 'required',
            'piasenta' => 'required',
            'pendarahan' => 'required',
            'usia_kehamilan' => 'required',
            'usia_hpht' => 'required',
            'keadaan_ibu' => 'required',
            'keadaan_bayi' => 'required',
            'berat_bayi' => 'required',
            'pesentasi' => 'required',
            'tempat' => 'required',
            'penolong' => 'required',
            'cara_persalinan' => 'required',
            'menejemen' => 'required',
            'pelayanan' => 'required',
            'integrasi' => 'required',
            'komplikasi' => 'required',
            'keadaan_tiba' => 'required',
            'rujuk' => 'required',
            'alamat_bersalin' => 'required',
        ]);

        Persalinan::create([
            'id_ibu' => $request->id_ibu,
            'kala1' => $request->kala1,
            'kala2' => $request->kala2,
            'bayi_lahir' => $request->bayi_lahir,
            'piasenta' => $request->piasenta,
            'pendarahan' => $request->pendarahan,
            'usia_kehamilan' => $request->usia_kehamilan,
            'usia_hpht' => $request->usia_hpht,
            'keadaan_ibu' => $request->keadaan_ibu,
            'keadaan_bayi' => $request->keadaan_bayi,
            'berat_bayi' => $request->berat_bayi,
            'pesentasi' => $request->pesentasi,
            'tempat' => $request->tempat,
            'penolong' => $request->penolong,
            'cara_persalinan' => $request->cara_persalinan,
            'menejemen' => $request->menejemen,
            'pelayanan' => $request->pelayanan,
            'integrasi' => $request->integrasi,
            'komplikasi' => $request->komplikasi,
            'keadaan_tiba' => $request->keadaan_tiba,
            'rujuk' => $request->rujuk,
            'alamat_bersalin' => $request->alamat_bersalin,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function update_persalinan(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'id_ibu' => 'required',
            'kala1' => 'required',
            'kala2' => 'required',
            'bayi_lahir' => 'required',
            'piasenta' => 'required',
            'pendarahan' => 'required',
            'usia_kehamilan' => 'required',
            'usia_hpht' => 'required',
            'keadaan_ibu' => 'required',
            'keadaan_bayi' => 'required',
            'berat_bayi' => 'required',
            'pesentasi' => 'required',
            'tempat' => 'required',
            'penolong' => 'required',
            'cara_persalinan' => 'required',
            'menejemen' => 'required',
            'pelayanan' => 'required',
            'integrasi' => 'required',
            'komplikasi' => 'required',
            'keadaan_tiba' => 'required',
            'rujuk' => 'required',
            'alamat_bersalin' => 'required',
        ]);
        $persalinan = Persalinan::findOrFail($id);
        $persalinan->update([
            'id_ibu' => $request->id_ibu,
            'kala1' => $request->kala1,
            'kala2' => $request->kala2,
            'bayi_lahir' => $request->bayi_lahir,
            'piasenta' => $request->piasenta,
            'pendarahan' => $request->pendarahan,
            'usia_kehamilan' => $request->usia_kehamilan,
            'usia_hpht' => $request->usia_hpht,
            'keadaan_ibu' => $request->keadaan_ibu,
            'keadaan_bayi' => $request->keadaan_bayi,
            'berat_bayi' => $request->berat_bayi,
            'pesentasi' => $request->pesentasi,
            'tempat' => $request->tempat,
            'penolong' => $request->penolong,
            'cara_persalinan' => $request->cara_persalinan,
            'menejemen' => $request->menejemen,
            'pelayanan' => $request->pelayanan,
            'integrasi' => $request->integrasi,
            'komplikasi' => $request->komplikasi,
            'keadaan_tiba' => $request->keadaan_tiba,
            'rujuk' => $request->rujuk,
            'alamat_bersalin' => $request->alamat_bersalin,
        ]);
        return redirect()->back()->with('success', 'Data persalinan berhasil diperbarui');
    }
    public function destroy_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::findOrFail($id_persalinan);
        $persalinan->delete();

        return redirect()->back()->with('success', 'Data anak berhasil dihapus');
    }
    public function getData_persalinan()
    {
        $persalinan = Persalinan::select('*');

        return DataTables::of($persalinan)->make(true);
    }
    public function edit_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::findOrFail($id_persalinan);
        return response()->json($persalinan);
    }
    public function show_persalinan($id)
    {
        $persalinan = Persalinan::with(['ibu' => function ($query) {
            $query->select('id_ibu', 'nama_ibu');
        }])->find($id);
        return response()->json($persalinan);
    }
    public function showIbuPage_persalinan()
    {
        $ibus = Ibu::all();
        return view('rekam_medis.persalinan')->with('ibus', $ibus);
    }

    //////// RIWAYAT OBSTETRIK DAN PEMERIKSAAN BIDAN ////////

    public function Ropb()
    {
        return view('rekam_medis.ropb');
    }
    public function store_ropb(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'gravida' => 'required',
            'partus' => 'required',            
            'abortus' => 'required',            
            'hidup' => 'required',            
            'rwyt_komplikasi' => 'required',            
            'pnykt_kronis_alergi' => 'required',            
            'tgl_periksa' => 'required',            
            'tgl_hpht' => 'required',            
            'tksrn_persalinan' => 'required',            
            'prlnan_sebelum' => 'required',            
            'berat_badan' => 'required',            
            'tinggi_badan' => 'required',            
            'buku_kia' => 'required',            
        ]);

        Ropb::create([
            'NIK' => $request->NIK,
            'gravida' => $request->gravida,
            'partus' => $request->partus,
            'abortus' => $request->abortus,
            'hidup' => $request->hidup,
            'rwyt_komplikasi' => $request->rwyt_komplikasi,
            'pnykt_kronis_alergi' => $request->pnykt_kronis_alergi,
            'tgl_periksa' => $request->tgl_periksa,
            'tgl_hpht' => $request->tgl_hpht,
            'tksrn_persalinan' => $request->tksrn_persalinan,
            'prlnan_sebelum' => $request->prlnan_sebelum,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'buku_kia' => $request->buku_kia,
        ]);
        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function getData_ropb()
    {
        $ropb = Ropb::select('*');

        return DataTables::of($ropb)->make(true);
    }
    public function showIbuPage_ropb()
    {
        $ibus = Ibu::all();
        return view('rekam_medis.ropb')->with('ibus', $ibus);
    }
    public function destroy_ropb($id)
    {
        $ropb = Ropb::findOrFail($id);
        $ropb->delete();

        return redirect()->back()->with('success', 'Data anak berhasil dihapus');
    }
    public function edit_ropb($id)
    {
        $ropb = Ropb::findOrFail($id);
        return response()->json($ropb);
    }

}
