<?php

namespace App\Http\Controllers;

use App\Models\Tm1;
use App\Models\Tm3;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ibu;
use App\Models\Anc;
use App\Models\Ropb;
use App\Models\Show_Anc;
use App\Models\Rencana_Persalinan;
use Illuminate\Support\Facades\Auth;

class ANCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //////// PEMERIKSAAN DOKTER TM 1 ////////
    public function Tm1()
    {
        $this->authorize("akses_page", Tm1::class);
        $ibus = Ibu::all();
        $tm1 = Tm1::all();
        return view('antenatal_care.tm1', compact('tm1', 'ibus'));
    }
    public function store_tm1(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'konjungtiva' => 'required',
            'sklera' => 'required',
            'kulit' => 'required',
            'leher' => 'required',
            'gigi_mulut' => 'required',
            'tht' => 'required',
            'jantung' => 'required',
            'paru' => 'required',
            'perut' => 'required',
            'tungkai' => 'required',
            'gs' => 'required',
            'crl' => 'required',
            'djj' => 'required',
            'usia_kehamilan' => 'required',
            'tkrsn_persalinan' => 'required',
            'skrining' => 'required',
            'kesimpulan' => 'required',
            'rekomendasi' => 'required',
        ]);

        Tm1::create([
            'NIK' => $request->NIK,
            'konjungtiva' => $request->konjungtiva,
            'sklera' => $request->sklera,
            'kulit' => $request->kulit,
            'leher' => $request->leher,
            'gigi_mulut' => $request->gigi_mulut,
            'tht' => $request->tht,
            'jantung' => $request->jantung,
            'paru' => $request->paru,
            'perut' => $request->perut,
            'tungkai' => $request->tungkai,
            'gs' => $request->gs,
            'crl' => $request->crl,
            'djj' => $request->djj,
            'usia_kehamilan' => $request->usia_kehamilan,
            'tkrsn_persalinan' => $request->tkrsn_persalinan,
            'skrining' => $request->skrining,
            'kesimpulan' => $request->kesimpulan,
            'rekomendasi' => $request->rekomendasi,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_tm1(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'konjungtiva' => 'required',
            'sklera' => 'required',
            'kulit' => 'required',
            'leher' => 'required',
            'gigi_mulut' => 'required',
            'tht' => 'required',
            'jantung' => 'required',
            'paru' => 'required',
            'perut' => 'required',
            'tungkai' => 'required',
            'gs' => 'required',
            'crl' => 'required',
            'djj' => 'required',
            'usia_kehamilan' => 'required',
            'tkrsn_persalinan' => 'required',
            'skrining' => 'required',
            'kesimpulan' => 'required',
            'rekomendasi' => 'required',
        ]);
        $tm1 = Tm1::findOrFail($id);
        $tm1->update([
            'NIK' => $request->NIK,
            'konjungtiva' => $request->konjungtiva,
            'sklera' => $request->sklera,
            'kulit' => $request->kulit,
            'leher' => $request->leher,
            'gigi_mulut' => $request->gigi_mulut,
            'tht' => $request->tht,
            'jantung' => $request->jantung,
            'paru' => $request->paru,
            'perut' => $request->perut,
            'tungkai' => $request->tungkai,
            'gs' => $request->gs,
            'crl' => $request->crl,
            'djj' => $request->djj,
            'usia_kehamilan' => $request->usia_kehamilan,
            'tkrsn_persalinan' => $request->tkrsn_persalinan,
            'skrining' => $request->skrining,
            'kesimpulan' => $request->kesimpulan,
            'rekomendasi' => $request->rekomendasi,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function getData_tm1()
    {
        $tm1 = Tm1::select('*');

        return DataTables::of($tm1)->make(true);
    }
    public function destroy_tm1($id)
    {
        try {
            $tm1 = Tm1::findOrFail($id);
            $tm1->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }
    public function edit_tm1($id)
    {
        $tm1 = Tm1::findOrFail($id);
        return response()->json($tm1);
    }
    public function show_tm1($id)
    {
        $tm1 = Tm1::with([
            'ibu' => function ($query) {
                $query->select('nama_ibu');
            }
        ])->find($id);
        return response()->json($tm1);
    }

    //////////////// ANC ////////////////

    public function Anc()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Anc::class);
            $ibus = Rencana_Persalinan::with('ibu')->where('user_id', $user->id)->get();
            return view('antenatal_care.anc', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_anc(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu' => 'required',
        ]);
        Anc::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_anc()
    {
        $anc = Anc::where('user_id', Auth::id())->select('*');
        return DataTables::of($anc)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }

    //////////////// SHOW ANC ////////////////

    public function show_anc($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $anc = Anc::findOrFail($id);
            if ($anc->user_id !== $user->id) {
                return redirect()->route('antenatal_care.anc')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            }
            $this->authorize('akses_page', Show_Anc::class);
            return view('antenatal_care.show_anc', compact('anc'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_showanc(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu',
            'tanggal',
            'usia_kehamilan',
            'trimester',
            'keluhan',
            'berat_badan',
            'td_mmhg',
            'lila',
            'sts_gizi',
            'tfu',
            'sts_imunisasi',
            'djj',
            'kpl_thd',
            'tbj',
            'presentasi',
            'jmlh_janin',
            'injeksi',
            'buku_kia',
            'fe',
            'pmt_bumil',
            'kelas_ibu',
            'konseling',
            'hemoglobin',
            'glcs_urine',
            'sifilis',
            'hbsag',
            'hiv',
            'arv',
            'malaria',
            'obat_malaria',
            'kelambu',
            'skrining_anam',
            'dahak',
            'tbc',
            'obat_TB',
            'sehat',
            'kontak_erat',
            'suspek',
            'konfimasi',
            'hdk',
            'abortus',
            'pendarahan',
            'infeksi',
            'kpd',
            'lain_lain_komplikasi',
            'puskesmas',
            'klinik',
            'rsia_rsb',
            'rs',
            'lain_lain_dirujuk',
            'tiba',
            'pulang',
            'keterangan',
        ]);

        Show_Anc::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
            'tanggal' => $request->tanggal,
            'usia_kehamilan' => $request->usia_kehamilan,
            'trimester' => $request->trimester,
            'keluhan' => $request->keluhan,
            'berat_badan' => $request->berat_badan,
            'td_mmhg' => $request->td_mmhg,
            'lila' => $request->lila,
            'sts_gizi' => $request->sts_gizi,
            'tfu' => $request->tfu,
            'sts_imunisasi' => $request->sts_imunisasi,
            'djj' => $request->djj,
            'kpl_thd' => $request->kpl_thd,
            'tbj' => $request->tbj,
            'presentasi' => $request->presentasi,
            'jmlh_janin' => $request->jmlh_janin,
            'injeksi' => $request->injeksi,
            'buku_kia' => $request->buku_kia,
            'fe' => $request->fe,
            'pmt_bumil' => $request->pmt_bumil,
            'kelas_ibu' => $request->kelas_ibu,
            'konseling' => $request->konseling,
            'hemoglobin' => $request->hemoglobin,
            'glcs_urine' => $request->glcs_urine,
            'sifilis' => $request->sifilis,
            'hbsag' => $request->hbsag,
            'hiv' => $request->hiv,
            'arv' => $request->arv,
            'malaria' => $request->malaria,
            'obat_malaria' => $request->obat_malaria,
            'kelambu' => $request->kelambu,
            'skrining_anam' => $request->skrining_anam,
            'dahak' => $request->dahak,
            'tbc' => $request->tbc,
            'obat_TB' => $request->obat_TB,
            'sehat' => $request->sehat,
            'kontak_erat' => $request->kontak_erat,
            'suspek' => $request->suspek,
            'konfimasi' => $request->konfimasi,
            'hdk' => $request->hdk,
            'abortus' => $request->abortus,
            'pendarahan' => $request->pendarahan,
            'infeksi' => $request->infeksi,
            'kpd' => $request->kpd,
            'lain_lain_komplikasi' => $request->lain_lain_komplikasi,
            'puskesmas' => $request->puskesmas,
            'klinik' => $request->klinik,
            'rsia_rsb' => $request->rsia_rsb,
            'rs' => $request->rs,
            'lain_lain_dirujuk' => $request->lain_lain_dirujuk,
            'tiba' => $request->tiba,
            'pulang' => $request->pulang,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_showanc(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tanggal',
            'usia_kehamilan',
            'trimester',
            'keluhan',
            'berat_badan',
            'td_mmhg',
            'lila',
            'sts_gizi',
            'tfu',
            'sts_imunisasi',
            'djj',
            'kpl_thd',
            'tbj',
            'presentasi',
            'jmlh_janin',
            'injeksi',
            'buku_kia',
            'fe',
            'pmt_bumil',
            'kelas_ibu',
            'konseling',
            'hemoglobin',
            'glcs_urine',
            'sifilis',
            'hbsag',
            'hiv',
            'arv',
            'malaria',
            'obat_malaria',
            'kelambu',
            'skrining_anam',
            'dahak',
            'tbc',
            'obat_TB',
            'sehat',
            'kontak_erat',
            'suspek',
            'konfimasi',
            'hdk',
            'abortus',
            'pendarahan',
            'infeksi',
            'kpd',
            'lain_lain_komplikasi',
            'puskesmas',
            'klinik',
            'rsia_rsb',
            'rs',
            'lain_lain_dirujuk',
            'tiba',
            'pulang',
            'keterangan',

        ]);
        $ancs = Show_Anc::findOrFail($id);
        $ancs->update([
            'tanggal' => $request->tanggal,
            'usia_kehamilan' => $request->usia_kehamilan,
            'trimester' => $request->trimester,
            'keluhan' => $request->keluhan,
            'berat_badan' => $request->berat_badan,
            'td_mmhg' => $request->td_mmhg,
            'lila' => $request->lila,
            'sts_gizi' => $request->sts_gizi,
            'tfu' => $request->tfu,
            'sts_imunisasi' => $request->sts_imunisasi,
            'djj' => $request->djj,
            'kpl_thd' => $request->kpl_thd,
            'tbj' => $request->tbj,
            'presentasi' => $request->presentasi,
            'jmlh_janin' => $request->jmlh_janin,
            'injeksi' => $request->injeksi,
            'buku_kia' => $request->buku_kia,
            'fe' => $request->fe,
            'pmt_bumil' => $request->pmt_bumil,
            'kelas_ibu' => $request->kelas_ibu,
            'konseling' => $request->konseling,
            'hemoglobin' => $request->hemoglobin,
            'glcs_urine' => $request->glcs_urine,
            'sifilis' => $request->sifilis,
            'hbsag' => $request->hbsag,
            'hiv' => $request->hiv,
            'arv' => $request->arv,
            'malaria' => $request->malaria,
            'obat_malaria' => $request->obat_malaria,
            'kelambu' => $request->kelambu,
            'skrining_anam' => $request->skrining_anam,
            'dahak' => $request->dahak,
            'tbc' => $request->tbc,
            'obat_TB' => $request->obat_TB,
            'sehat' => $request->sehat,
            'kontak_erat' => $request->kontak_erat,
            'suspek' => $request->suspek,
            'konfimasi' => $request->konfimasi,
            'hdk' => $request->hdk,
            'abortus' => $request->abortus,
            'pendarahan' => $request->pendarahan,
            'infeksi' => $request->infeksi,
            'kpd' => $request->kpd,
            'lain_lain_komplikasi' => $request->lain_lain_komplikasi,
            'puskesmas' => $request->puskesmas,
            'klinik' => $request->klinik,
            'rsia_rsb' => $request->rsia_rsb,
            'rs' => $request->rs,
            'lain_lain_dirujuk' => $request->lain_lain_dirujuk,
            'tiba' => $request->tiba,
            'pulang' => $request->pulang,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function getData_showanc($id_ibu)
    {
        $data = Show_Anc::where('id_ibu', $id_ibu)->get();
        return DataTables::of($data)->make(true);
    }
    public function edit_showanc($id)
    {
        $ancs = Show_Anc::findOrFail($id);
        return response()->json($ancs);
    }

    //////// RIWAYAT OBSTETRIK DAN PEMERIKSAAN BIDAN ////////
    public function Ropb()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Ropb::class);
            $ibus = Ibu::where('user_id', $user->id)->get();
            return view('antenatal_care.ropb', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_ropb(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu' => 'required',
            'gravida' => 'required',
            'partus' => 'required',
            'abortus' => 'required',
            'hidup' => 'required',
            'rwyt_komplikasi' => 'required',
            'pnykt_kronis_alergi' => 'required',
            'tgl_periksa' => 'required',
            'tgl_hpht' => 'required',
            'tksrn_persalinan' => 'required',
            'prlnan_sebelum',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'buku_kia' => 'required',
        ]);

        Ropb::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
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
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_ropb(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'gravida' => 'required',
            'partus' => 'required',
            'abortus' => 'required',
            'hidup' => 'required',
            'rwyt_komplikasi' => 'required',
            'pnykt_kronis_alergi' => 'required',
            'tgl_periksa' => 'required',
            'tgl_hpht' => 'required',
            'tksrn_persalinan' => 'required',
            'prlnan_sebelum',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'buku_kia' => 'required',

        ]);
        $ropb = Ropb::findOrFail($id);
        $ropb->update([
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
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }
    public function getData_ropb()
    {
        $ropb = Ropb::with('ibu')->where('user_id', Auth::id())->get();

        return DataTables::of($ropb)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }
    public function edit_ropb($id)
    {
        $ropb = Ropb::findOrFail($id);
        return response()->json($ropb);
    }
    public function show_ropb($id)
    {
        $ropb = Ropb::with([
            'ibu' => function ($query) {
                $query->select('id_ibu');
            }
        ])->find($id);

        return response()->json($ropb);
    }

    //////// RENCANA PERSALINAN ////////
    public function Rnca()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Rencana_Persalinan::class);
            $ibus = Ropb::with('ibu')->where('user_id', $user->id)->get();
            return view('antenatal_care.rnca_persalinan', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_rnca(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu' => 'required',
            'tgl_persalinan' => 'required',
            'penolong' => 'required',
            'tempat' => 'required',
            'pendamping' => 'required',
            'transport' => 'required',
            'pendonor' => 'required',
            'pendonor_darah' => 'required',
        ]);

        Rencana_Persalinan::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
            'tgl_persalinan' => $request->tgl_persalinan,
            'penolong' => $request->penolong,
            'tempat' => $request->tempat,
            'pendamping' => $request->pendamping,
            'transport' => $request->transport,
            'pendonor' => $request->pendonor,
            'pendonor_darah' => $request->pendonor_darah,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_rnca(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tgl_persalinan' => 'required',
            'penolong' => 'required',
            'tempat' => 'required',
            'pendamping' => 'required',
            'transport' => 'required',
            'pendonor' => 'required',

        ]);
        $rnca = Rencana_Persalinan::findOrFail($id);
        $rnca->update([
            'tgl_persalinan' => $request->tgl_persalinan,
            'penolong' => $request->penolong,
            'tempat' => $request->tempat,
            'pendamping' => $request->pendamping,
            'transport' => $request->transport,
            'pendonor' => $request->pendonor,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }
    public function getData_rnca()
    {
        $rnca = Rencana_Persalinan::where('user_id', Auth::id())->select('*');
        return DataTables::of($rnca)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }
    public function edit_rnca($id)
    {
        $rnca = Rencana_Persalinan::findOrFail($id);
        return response()->json($rnca);
    }
    public function show_rnca($id)
    {
        $rnca = Rencana_Persalinan::with([
            'ibu' => function ($query) {
                $query->select('id_ibu');
            }
        ])->find($id);
        return response()->json($rnca);
    }

    //////// PEMERIKSAAN DOKTER TM3 ////////
    public function Tm3()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Tm3::class);
            $ibus = Ibu::all();
            $tm3 = Tm3::all();
            return view('antenatal_care.tm3', compact('tm3', 'ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_tm3(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'konjungtiva' => 'required',
            'sklera' => 'required',
            'kulit' => 'required',
            'leher' => 'required',
            'gigi_mulut' => 'required',
            'tht' => 'required',
            'jantung' => 'required',
            'paru' => 'required',
            'perut' => 'required',
            'tungkai' => 'required',
            'gs' => 'required',
            'crl' => 'required',
            'djj' => 'required',
            'usia_kehamilan' => 'required',
            'tkrsn_persalinan' => 'required',
            'hb' => 'required',
            'gula_darah' => 'required',
            'gula_darah_pp' => 'required',
            'konsultasi' => 'required',
            'rekomendasi' => 'required',
            'rnca_persalinan' => 'required',
            'rnca_kontrasepsi' => 'required',
        ]);
        Tm3::create([
            'NIK' => $request->NIK,
            'konjungtiva' => $request->konjungtiva,
            'sklera' => $request->sklera,
            'kulit' => $request->kulit,
            'leher' => $request->leher,
            'gigi_mulut' => $request->gigi_mulut,
            'tht' => $request->tht,
            'jantung' => $request->jantung,
            'paru' => $request->paru,
            'perut' => $request->perut,
            'tungkai' => $request->tungkai,
            'gs' => $request->gs,
            'crl' => $request->crl,
            'djj' => $request->djj,
            'usia_kehamilan' => $request->usia_kehamilan,
            'tkrsn_persalinan' => $request->tkrsn_persalinan,
            'hb' => $request->hb,
            'gula_darah' => $request->gula_darah,
            'gula_darah_pp' => $request->gula_darah_pp,
            'konsultasi' => $request->konsultasi,
            'rekomendasi' => $request->rekomendasi,
            'rnca_persalinan' => $request->rnca_persalinan,
            'rnca_kontrasepsi' => $request->rnca_kontrasepsi,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_tm3(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'konjungtiva' => 'required',
            'sklera' => 'required',
            'kulit' => 'required',
            'leher' => 'required',
            'gigi_mulut' => 'required',
            'tht' => 'required',
            'jantung' => 'required',
            'paru' => 'required',
            'perut' => 'required',
            'tungkai' => 'required',
            'gs' => 'required',
            'crl' => 'required',
            'djj' => 'required',
            'usia_kehamilan' => 'required',
            'tkrsn_persalinan' => 'required',
            'hb' => 'required',
            'gula_darah' => 'required',
            'gula_darah_pp' => 'required',
            'konsultasi' => 'required',
            'rekomendasi' => 'required',
            'rnca_persalinan' => 'required',
            'rnca_kontrasepsi' => 'required',
        ]);
        $tm3 = Tm3::findOrFail($id);
        $tm3->update([
            'NIK' => $request->NIK,
            'konjungtiva' => $request->konjungtiva,
            'sklera' => $request->sklera,
            'kulit' => $request->kulit,
            'leher' => $request->leher,
            'gigi_mulut' => $request->gigi_mulut,
            'tht' => $request->tht,
            'jantung' => $request->jantung,
            'paru' => $request->paru,
            'perut' => $request->perut,
            'tungkai' => $request->tungkai,
            'gs' => $request->gs,
            'crl' => $request->crl,
            'djj' => $request->djj,
            'usia_kehamilan' => $request->usia_kehamilan,
            'tkrsn_persalinan' => $request->tkrsn_persalinan,
            'hb' => $request->hb,
            'gula_darah' => $request->gula_darah,
            'gula_darah_pp' => $request->gula_darah_pp,
            'konsultasi' => $request->konsultasi,
            'rekomendasi' => $request->rekomendasi,
            'rnca_persalinan' => $request->rnca_persalinan,
            'rnca_kontrasepsi' => $request->rnca_kontrasepsi,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function destroy_tm3($id)
    {
        try {
            $tm3 = Tm3::findOrFail($id);
            $tm3->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }
    public function edit_tm3($id)
    {
        $tm3 = Tm3::findOrFail($id);
        return response()->json($tm3);
    }
    public function getData_tm3()
    {
        $tm3 = Tm3::select('*');
        return DataTables::of($tm3)->make(true);
    }
    public function show_tm3($id)
    {
        $tm3 = Tm3::with([
            'ibu' => function ($query) {
                $query->select('nama_ibu');
            }
        ])->find($id);
        return response()->json($tm3);
    }
}
