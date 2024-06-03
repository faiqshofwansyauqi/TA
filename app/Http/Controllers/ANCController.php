<?php

namespace App\Http\Controllers;

use App\Models\Tm1;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ibu;
use App\Models\Anc;
use App\Models\Show_Anc;

class ANCController extends Controller
{
    //////// PEMERIKSAAN DOKTER TM 1 ////////
    public function Tm1()
    {
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
        $tm1 = Tm1::findOrFail($id);
        $tm1->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
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
        $ibus = Ibu::all();
        $anc = Anc::all();
        // dd($anc);
        return view('antenatal_care.anc', compact('anc', 'ibus'));
    }
    public function store_anc(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
        ]);

        Anc::create([
            'NIK' => $request->NIK,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_anc()
    {
        $anc = Anc::select('*');

        return DataTables::of($anc)->make(true);
    }
    public function destroy_anc($id)
    {
        $anc = Anc::findOrFail($id);
        $anc->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    public function edit_anc($id)
    {
        $anc = Anc::findOrFail($id);
        return response()->json($anc);
    }
    public function update_anc(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
        ]);
        $anc = anc::findOrFail($id);
        $anc->update([
            'NIK' => $request->NIK,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    //////////////// SHOW ANC ////////////////

    public function show_anc($id)
    {
        $anc = Anc::findOrFail($id);
        $ancs = Show_Anc::all();
        // dd($anc);
        return view('antenatal_care.show_anc', compact('ancs', 'anc'));
    }
    public function store_showanc(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'tanggal' => 'required',
            'usia_kehamilan' => 'required',
            'trimester' => 'required',
            'keluhan' => 'required',
            'berat_badan' => 'required',
            'td_mmhg' => 'required',
            'lila' => 'required',
            'sts_gizi' => 'required',
            'tfu' => 'required',
            'sts_imunisasi' => 'required',
            'djj' => 'required',
            'kpl_thd' => 'required',
            'tbj' => 'required',
            'presentasi' => 'required',
            'jmlh_janin' => 'required',
            'injeksi' => 'required',
            'buku_kia' => 'required',
            'fe' => 'required',
            'pmt_bumil' => 'required',
            'kelas_ibu' => 'required',
            'konseling' => 'required',
            'hemoglobin' => 'required',
            'glcs_urine' => 'required',
            'sifilis' => 'required',
            'hbsag' => 'required',
            'hiv' => 'required',
            'arv' => 'required',
            'malaria' => 'required',
            'obat_malaria' => 'required',
            'kelambu' => 'required',
            'skrining_anam' => 'required',
            'dahak' => 'required',
            'tbc' => 'required',
            'obat_TB' => 'required',
            'sehat' => 'required',
            'kontak_erat' => 'required',
            'suspek' => 'required',
            'konfimasi' => 'required',
            'hdk' => 'required',
            'abortus' => 'required',
            'pendarahan' => 'required',
            'infeksi' => 'required',
            'anemia' => 'required',
            'kpd' => 'required',
            'lain_lain_komplikasi' => 'required',
            'puskesmas' => 'required',
            'klinik' => 'required',
            'rsia_rsb' => 'required',
            'rs' => 'required',
            'lain_lain_dirujuk' => 'required',
            'tiba' => 'required',
            'pulang' => 'required',
            'keterangan' => 'required',
        ]);

        Show_Anc::create([
            'NIK' => $request->NIK,
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
            'anemia' => $request->anemia,
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
            'tanggal' => 'required',
            'usia_kehamilan' => 'required',
            'trimester' => 'required',
            'keluhan' => 'required',
            'berat_badan' => 'required',
            'td_mmhg' => 'required',
            'lila' => 'required',
            'sts_gizi' => 'required',
            'tfu' => 'required',
            'sts_imunisasi' => 'required',
            'djj' => 'required',
            'kpl_thd' => 'required',
            'tbj' => 'required',
            'presentasi' => 'required',
            'jmlh_janin' => 'required',
            'injeksi' => 'required',
            'buku_kia' => 'required',
            'fe' => 'required',
            'pmt_bumil' => 'required',
            'kelas_ibu' => 'required',
            'konseling' => 'required',
            'hemoglobin' => 'required',
            'glcs_urine' => 'required',
            'sifilis' => 'required',
            'hbsag' => 'required',
            'hiv' => 'required',
            'arv' => 'required',
            'malaria' => 'required',
            'obat_malaria' => 'required',
            'kelambu' => 'required',
            'skrining_anam' => 'required',
            'dahak' => 'required',
            'tbc' => 'required',
            'obat_TB' => 'required',
            'sehat' => 'required',
            'kontak_erat' => 'required',
            'suspek' => 'required',
            'konfimasi' => 'required',
            'hdk' => 'required',
            'abortus' => 'required',
            'pendarahan' => 'required',
            'infeksi' => 'required',
            'anemia' => 'required',
            'kpd' => 'required',
            'lain_lain' => 'required',

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
            'anemia' => $request->anemia,
            'kpd' => $request->kpd,
            'lain_lain' => $request->lain_lain,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function getData_showanc($NIK)
    {
        $data = Show_Anc::where('NIK', $NIK)->get();
        return DataTables::of($data)->make(true);
    }
    public function edit_showanc($id)
    {
        $ancs = Show_Anc::findOrFail($id);
        return response()->json($ancs);
    }

}
