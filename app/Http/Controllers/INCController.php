<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Rencana_Persalinan;
use Yajra\DataTables\Facades\DataTables;


class INCController extends Controller
{
    //////// MASA PERSALINAN ////////
    public function Persalinan()
    {
        $persalinan = Persalinan::all();
        $ibus = Rencana_Persalinan::all();
        return view('intranatal_care.persalinan', compact('persalinan', 'ibus'));
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
            'detail_integrasi' => 'required',
            'komplikasi' => 'required',
            'keadaan_tiba' => 'required',
            'keadaan_pulang' => 'required',
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
            'detail_integrasi' => $request->detail_integrasi,
            'komplikasi' => $request->komplikasi,
            'keadaan_tiba' => $request->keadaan_tiba,
            'keadaan_pulang' => $request->keadaan_pulang,
            'rujuk' => $request->rujuk,
            'alamat_bersalin' => $request->alamat_bersalin,
        ]);

        return redirect()->back()->with('success', 'Data persalinan berhasil ditambahkan');
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
            'detail_integrasi' => 'required',
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
            'detail_integrasi' => $request->detail_integrasi,
            'komplikasi' => $request->komplikasi,
            'keadaan_tiba' => $request->keadaan_tiba,
            'rujuk' => $request->rujuk,
            'alamat_bersalin' => $request->alamat_bersalin,
        ]);
        return redirect()->back()->with('success', 'Data persalinan berhasil diperbarui');
    }
    public function destroy_persalinan($id_persalinan)
    {
        try{
            $persalinan = Persalinan::findOrFail($id_persalinan);
            $persalinan->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }        
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
    public function show_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::with([
            'ibu' => function ($query) {
                $query->select('nama_ibu');
            }
        ])->find($id_persalinan);
        return response()->json($persalinan);
    }
}
