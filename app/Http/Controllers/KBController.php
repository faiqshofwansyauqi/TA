<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan_Ulang;
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

    //////// KUNJUNGAN ULANG ////////

    public function kunjungan_ulang($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $kb = KB::findOrFail($id);
            if ($kb->user_id !== $user->id) {
                return redirect()->route('kb.kb')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            }
            $this->authorize('akses_page', KB::class);
            session(['id_kb' => $kb->id]);
            return view('kb.kunjungan_ulang', compact('kb'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_kunjungan_ulang(Request $request)
    {
        // dd($request);
        $id_kb = session('id_kb');
        Kunjungan_Ulang::create([
            'id_kb' => $id_kb,
            'tgl_dilayani' => $request->tgl_dilayani,
            'berat_badan' => $request->berat_badan,
            'tkn_darah' => $request->tkn_darah,
            'interval' => $request->interval,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect()->back()->with('success', 'Data kunjungan ulang berhasil ditambahkan');
    }
    public function update_kunjungan_ulang(Request $request, $id)
    {
        // dd($request);
        $kb = Kunjungan_Ulang::findOrFail($id);
        $kb->update([
            'berat_badan' => $request->berat_badan,
            'tkn_darah' => $request->tkn_darah,
            'interval' => $request->interval,
            'tgl_dilayani' => $request->tgl_dilayani,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect()->back()->with('success', 'Data anak berhasil diupdate');
    }
    public function getData_kunjungan_ulang()
    {
        $user = Auth::user();
        $kunjunganUlang = Kunjungan_Ulang::whereHas('KB', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->select('*');
        return DataTables::of($kunjunganUlang)
            ->make(true);
    }
    public function edit_kunjungan_ulang($id)
    {
        $kb = Kunjungan_Ulang::findOrFail($id);
        return response()->json($kb);
    }
    public function show_kb($id)
    {
        $kb = KB::with([
            'ibu' => function ($query) {
                $query->select('id_ibu');
            }
        ])->find($id);
        return response()->json($kb);
    }


}
