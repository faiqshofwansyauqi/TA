<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibu;
use App\Models\Nifas;
use App\Models\Show_nifas;
use Yajra\DataTables\Facades\DataTables;

class PNCController extends Controller
{
    //////// MASA NIFAS ////////

    public function Nifas()
    {
        $ibus = Ibu::all();
        $nifas = Nifas::all();
        // dd($nifas);
        return view('postnatal_care.nifas', compact('nifas', 'ibus'));
    }
    public function store_nifas(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
        ]);

        Nifas::create([
            'NIK' => $request->NIK,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_nifas()
    {
        $nifas = Nifas::select('*');

        return DataTables::of($nifas)->make(true);
    }
    public function destroy_nifas($id)
    {
        $nifas = Nifas::findOrFail($id);
        $nifas->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    /////// SHOW NIFAS ///////

    public function show_nifas($id)
    {
        $nifas = Nifas::findOrFail($id);
        
        // dd($nifas);
        return view('postnatal_care.show_nifas', compact( 'nifas'));
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

        Show_nifas::create([
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
        $nifass = Show_nifas::findOrFail($id);
        $nifass->update([
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
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function getData_showanc($NIK)
    {
        $data = Show_nifas::where('NIK', $NIK)->get();
        return DataTables::of($data)->make(true);
    }
    public function edit_showanc($id)
    {
        $nifass = Show_nifas::findOrFail($id);
        return response()->json($nifass);
    }
}
