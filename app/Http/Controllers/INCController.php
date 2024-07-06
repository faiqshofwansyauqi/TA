<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Anc;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class INCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //////// MASA PERSALINAN ////////
    public function Persalinan()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Persalinan::class);
            $ibus = Anc::with('ibu')->where('user_id', $user->id)->get();
            return view('intranatal_care.persalinan', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
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
            'jenis_kelamin' => 'required',
            'panjang_bayi' => 'required',
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
            'user_id' => Auth::id(),
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
            'jenis_kelamin' => $request->jenis_kelamin,
            'panjang_bayi' => $request->panjang_bayi,
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
            'jenis_kelamin' => 'required',
            'panjang_bayi' => 'required',
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
        $persalinan = Persalinan::findOrFail($id);
        $persalinan->update([
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
            'jenis_kelamin' => $request->jenis_kelamin,
            'panjang_bayi' => $request->panjang_bayi,
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
        return redirect()->back()->with('success', 'Data persalinan berhasil diperbarui');
    }
    public function getData_persalinan()
    {
        $persalinan = Persalinan::where('user_id', Auth::id())->select('*');
        return DataTables::of($persalinan)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }
    public function edit_persalinan($id)
    {
        $persalinan = Persalinan::findOrFail($id);
        return response()->json($persalinan);
    }
    public function show_persalinan($id)
    {
        $persalinan = Persalinan::with([
            'ibu' => function ($query) {
                $query->select('id_ibu');
            }
        ])->find($id);
        return response()->json($persalinan);
    }
}
