<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Anc;
use Illuminate\Support\Facades\Auth;
use App\Models\Ibu;
use App\Models\Ropb;
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
            'id_ibu',
            'tgl_datang',
            'nama_suami',
            'usia_ibu',
            'alamat',
            'gravida',
            'partus',
            'abortus',
            'usia_hamil',
            'keadaan_ibu',
            'kala1',
            'kala2',
            'kala3',
            'tgl_lahir_bayi',
            'brt_bayi',
            'pnjg_bayi',
            'lngkr_kpl_bayi',
            'vit_k',
            'hbo',
            'jenis_kelamin',
        ]);

        Persalinan::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
            'tgl_datang' => $request->tgl_datang,
            'usia_ibu' => $request->usia_ibu,
            'nama_suami' => $request->nama_suami,
            'alamat' => $request->alamat,
            'gravida' => $request->gravida,
            'partus' => $request->partus,
            'abortus' => $request->abortus,
            'usia_hamil' => $request->usia_hamil,
            'keadaan_ibu' => $request->keadaan_ibu,
            'kala1' => $request->kala1,
            'kala2' => $request->kala2,
            'kala3' => $request->kala3,
            'tgl_lahir_bayi' => $request->tgl_lahir_bayi,
            'brt_bayi' => $request->brt_bayi,
            'pnjg_bayi' => $request->pnjg_bayi,
            'lngkr_kpl_bayi' => $request->lngkr_kpl_bayi,
            'vit_k' => $request->vit_k,
            'hbo' => $request->hbo,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->back()->with('success', 'Data persalinan berhasil ditambahkan');
    }
    public function update_persalinan(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'tgl_datang',
            'usia_ibu',
            'alamat',
            'gravida',
            'partus',
            'abortus',
            'usia_hamil',
            'keadaan_ibu',
            'kala1',
            'kala2',
            'kala3',
            'tgl_lahir_bayi',
            'brt_bayi',
            'pnjg_bayi',
            'lngkr_kpl_bayi',
            'vit_k',
            'hbo',
            'jenis_kelamin',
        ]);
        $persalinan = Persalinan::findOrFail($id);
        $persalinan->update([
            'tgl_datang' => $request->tgl_datang,
            'usia_ibu' => $request->usia_ibu,
            'alamat' => $request->alamat,
            'gravida' => $request->gravida,
            'partus' => $request->partus,
            'abortus' => $request->abortus,
            'usia_hamil' => $request->usia_hamil,
            'keadaan_ibu' => $request->keadaan_ibu,
            'kala1' => $request->kala1,
            'kala2' => $request->kala2,
            'kala3' => $request->kala3,
            'tgl_lahir_bayi' => $request->tgl_lahir_bayi,
            'brt_bayi' => $request->brt_bayi,
            'pnjg_bayi' => $request->pnjg_bayi,
            'lngkr_kpl_bayi' => $request->lngkr_kpl_bayi,
            'vit_k' => $request->vit_k,
            'hbo' => $request->hbo,
            'jenis_kelamin' => $request->jenis_kelamin,
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
    
    public function getInfo_Rnca_persalinan($id_ibu)
    {
        $ibu = Ibu::where('id_ibu', $id_ibu)->first();
        if ($ibu) {
            $ropb = Ropb::where('id_ibu', $ibu->id_ibu)->first();
            return response()->json([
                'ibu' => $ibu,
                'ropb' => $ropb,
            ]);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }
}
