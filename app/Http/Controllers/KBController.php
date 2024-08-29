<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ibu;
use App\Models\Anak;
use App\Models\Ropb;
use App\Models\KB;
use App\Models\Show_Kms;
use Yajra\DataTables\Facades\DataTables;

class KBController extends Controller
{
    public function Kb()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', KB::class);
            $ibus = Ibu::where('user_id', $user->id)->get();
            return view('kb.kb', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_kb(Request $request)
    {
        KB::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
            'bulan_anak_kecil' => $request->bulan_anak_kecil,
            'tahun_anak_kecil' => $request->tahun_anak_kecil,
            'anak_laki' => $request->anak_laki,
            'anak_perempuan' => $request->anak_perempuan,
            'status_peserta' => $request->status_peserta,
            'kb_terakhir' => $request->kb_terakhir,
            'haid_terahkhir' => $request->haid_terahkhir,
            'status_hamil' => $request->status_hamil,
            'gravida' => $request->gravida,
            'partus' => $request->partus,
            'abortus' => $request->abortus,
            'menyusui' => $request->menyusui,
            'rwyt_pengakit' => $request->rwyt_pengakit,
            'keadaan_umum' => $request->keadaan_umum,
            'berat_badan' => $request->berat_badan,
            'tkn_darah' => $request->tkn_darah,
            'psng_iud' => $request->psng_iud,
            'posisi_rahim' => $request->posisi_rahim,
            'pmrksn_tambahan' => $request->pmrksn_tambahan,
            'alat_knstps' => $request->alat_knstps,
            'alat_knstps_dipilih' => $request->alat_knstps_dipilih,
            'tgl_dilayani' => $request->tgl_dilayani,
            'tgl_kembali' => $request->tgl_kembali,
            'tgl_dicabut' => $request->tgl_dicabut,
        ]);
        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function update_kb(Request $request, $id)
    {
        // dd($request);
        $kb = KB::findOrFail($id);
        $kb->update([
            'bulan_anak_kecil' => $request->bulan_anak_kecil,
            'tahun_anak_kecil' => $request->tahun_anak_kecil,
            'anak_laki' => $request->anak_laki,
            'anak_perempuan' => $request->anak_perempuan,
            'status_peserta' => $request->status_peserta,
            'kb_terakhir' => $request->kb_terakhir,
            'haid_terahkhir' => $request->haid_terahkhir,
            'status_hamil' => $request->status_hamil,
            'gravida' => $request->gravida,
            'partus' => $request->partus,
            'abortus' => $request->abortus,
            'menyusui' => $request->menyusui,
            'rwyt_pengakit' => $request->rwyt_pengakit,
            'keadaan_umum' => $request->keadaan_umum,
            'berat_badan' => $request->berat_badan,
            'tkn_darah' => $request->tkn_darah,
            'psng_iud' => $request->psng_iud,
            'posisi_rahim' => $request->posisi_rahim,
            'pmrksn_tambahan' => $request->pmrksn_tambahan,
            'alat_knstps' => $request->alat_knstps,
            'alat_knstps_dipilih' => $request->alat_knstps_dipilih,
            'tgl_dilayani' => $request->tgl_dilayani,
            'tgl_kembali' => $request->tgl_kembali,
            'tgl_dicabut' => $request->tgl_dicabut,
        ]);
        return redirect()->back()->with('success', 'Data anak berhasil diupdate');
    }
    public function getInfo_kb($id_ibu)
    {
        $ibu = Ibu::where('id_ibu', $id_ibu)->first();
        if ($ibu) {
            $ropb = Ropb::where('id_ibu', $ibu->id_ibu)->first();
            $anak = Anak::where('id_ibu', $ibu->id_ibu)->select('jenis_kelamin')->get();
            $kms = Show_Kms::where('id_ibu', $ibu->id_ibu)->get();
            return response()->json([
                'ibu' => $ibu,
                'ropb' => $ropb,
                'anak' => $anak,
                'kms' => $kms,
            ]);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }
    public function getData_kb()
    {
        $kb = KB::where('user_id', Auth::id())->select('*');
        return DataTables::of($kb)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }
    public function edit_kb($id)
    {
        $kb = KB::findOrFail($id);
        return response()->json($kb);
    }

}
