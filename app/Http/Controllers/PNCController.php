<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anc;
use App\Models\Pemantauan_Bayi;
use App\Models\Nifas;
use App\Models\Ppia;
use App\Models\Show_Nifas;
use App\Models\Show_Ppia;
use App\Models\Show_Hepatitis;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class PNCController extends Controller
{
    //////// MASA NIFAS ////////

    public function Nifas()
    {
        $ibus = Anc::all();
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
        try {
            $nifas = Nifas::findOrFail($id);
            $nifas->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }

    /////// SHOW NIFAS ///////

    public function show_nifas($id)
    {
        $nifas = Nifas::findOrFail($id);
        $nifass = Show_Nifas::all();
        // dd($nifass);
        return view('postnatal_care.show_nifas', compact('nifass', 'nifas'));
    }
    public function store_shownifas(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'kf' => 'required',
            'td_mmhg' => 'required',
            'suhu' => 'required',
            'buku_kia' => 'required',
            'fe' => 'required',
            'vit' => 'required',
            'cd_4' => 'required',
            'anti_malaria' => 'required',
            'anti_tb' => 'required',
            'arv' => 'required',
            'ppp' => 'required',
            'infeksi' => 'required',
            'hdk' => 'required',
            'lainnya_komplikasi' => 'required',
            'klasifikasi' => 'required',
            'tata_laksana' => 'required',
            'puskesmas' => 'required',
            'klinik' => 'required',
            'rsia_rsb' => 'required',
            'rs' => 'required',
            'lain_lain_dirujuk' => 'required',
            'tiba' => 'required',
            'pulang' => 'required',
        ]);

        Show_Nifas::create([
            'NIK' => $request->NIK,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'kf' => $request->kf,
            'td_mmhg' => $request->td_mmhg,
            'suhu' => $request->suhu,
            'buku_kia' => $request->buku_kia,
            'fe' => $request->fe,
            'vit' => $request->vit,
            'cd_4' => $request->cd_4,
            'anti_malaria' => $request->anti_malaria,
            'anti_tb' => $request->anti_tb,
            'arv' => $request->arv,
            'ppp' => $request->ppp,
            'infeksi' => $request->infeksi,
            'hdk' => $request->hdk,
            'lainnya_komplikasi' => $request->lainnya_komplikasi,
            'klasifikasi' => $request->klasifikasi,
            'tata_laksana' => $request->tata_laksana,
            'puskesmas' => $request->puskesmas,
            'klinik' => $request->klinik,
            'rsia_rsb' => $request->rsia_rsb,
            'rs' => $request->rs,
            'lain_lain_dirujuk' => $request->lain_lain_dirujuk,
            'tiba' => $request->tiba,
            'pulang' => $request->pulang,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_shownifas(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tanggal' => 'required',
            'hari' => 'required',
            'kf' => 'required',
            'td_mmhg' => 'required',
            'suhu' => 'required',
            'buku_kia' => 'required',
            'fe' => 'required',
            'vit' => 'required',
            'cd_4' => 'required',
            'anti_malaria' => 'required',
            'anti_tb' => 'required',
            'arv' => 'required',
            'ppp' => 'required',
            'infeksi' => 'required',
            'hdk' => 'required',
            'lainnya_komplikasi' => 'required',
            'klasifikasi' => 'required',
            'tata_laksana' => 'required',
            'puskesmas' => 'required',
            'klinik' => 'required',
            'rsia_rsb' => 'required',
            'rs' => 'required',
            'lain_lain_dirujuk' => 'required',
            'tiba' => 'required',
            'pulang' => 'required',

        ]);
        $nifass = Show_Nifas::findOrFail($id);
        $nifass->update([
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'kf' => $request->kf,
            'td_mmhg' => $request->td_mmhg,
            'suhu' => $request->suhu,
            'buku_kia' => $request->buku_kia,
            'fe' => $request->fe,
            'vit' => $request->vit,
            'cd_4' => $request->cd_4,
            'anti_malaria' => $request->anti_malaria,
            'anti_tb' => $request->anti_tb,
            'arv' => $request->arv,
            'ppp' => $request->ppp,
            'infeksi' => $request->infeksi,
            'hdk' => $request->hdk,
            'lainnya_komplikasi' => $request->lainnya_komplikasi,
            'klasifikasi' => $request->klasifikasi,
            'tata_laksana' => $request->tata_laksana,
            'puskesmas' => $request->puskesmas,
            'klinik' => $request->klinik,
            'rsia_rsb' => $request->rsia_rsb,
            'rs' => $request->rs,
            'lain_lain_dirujuk' => $request->lain_lain_dirujuk,
            'tiba' => $request->tiba,
            'pulang' => $request->pulang,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function getData_shownifas($NIK)
    {
        $data = Show_Nifas::where('NIK', $NIK)->get();
        return DataTables::of($data)->make(true);
    }
    public function edit_shownifas($id)
    {
        $nifass = Show_Nifas::findOrFail($id);
        return response()->json($nifass);
    }

    ///////  PEMANTAUAN PPIA ///////

    public function Ppia()
    {
        $ibus = Anc::all();
        $ppia = Ppia::all();
        return view('postnatal_care.ppia', compact('ppia', 'ibus'));
    }
    public function store_ppia(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
        ]);
        Ppia::create([
            'NIK' => $request->NIK,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_ppia()
    {
        $ppia = Ppia::select('*');
        return DataTables::of($ppia)->make(true);
    }
    public function destroy_ppia($id)
    {
        try {
            $ppia = Ppia::findOrFail($id);
            $ppia->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }

    ///////  PEMANTAUAN SHOW PPIA ///////

    public function show_ppia($id)
    {
        $ppia = Ppia::findOrFail($id);
        $NIK = $ppia->NIK;
        $ppias = Show_Ppia::where('NIK', $NIK)->get();
        return view('postnatal_care.show_ppia', compact('ppias', 'ppia'));
    }
    public function store_showppia(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'tanggal_screening_hbsag' => 'required',
            'tanggal_screening_hiv' => 'required',
            'tanggal_screening_sifilis' => 'required',
            'kode_specimen_hbsag' => 'required',
            'kode_specimen_hiv' => 'required',
            'kode_specimen_sifilis' => 'required',
            'hasil_screening_hbsag' => 'required',
            'hasil_screening_hiv' => 'required',
            'hasil_screening_sifilis' => 'required',
            'tgl_masuk_pdp' => 'required',
            'tgl_mulai_arv' => 'required',
            'ditangani_sifilis' => 'required',
            'obat_adequat' => 'required',
            'dirujuk' => 'required',
            'status_hiv' => 'required',
            'periksa_sifilis' => 'required',
            'faskes_rujukan' => 'required',
        ]);

        Show_Ppia::create([
            'NIK' => $request->NIK,
            'tanggal_screening_hbsag' => $request->tanggal_screening_hbsag,
            'tanggal_screening_hiv' => $request->tanggal_screening_hiv,
            'tanggal_screening_sifilis' => $request->tanggal_screening_sifilis,
            'kode_specimen_hbsag' => $request->kode_specimen_hbsag,
            'kode_specimen_hiv' => $request->kode_specimen_hiv,
            'kode_specimen_sifilis' => $request->kode_specimen_sifilis,
            'hasil_screening_hbsag' => $request->hasil_screening_hbsag,
            'hasil_screening_hiv' => $request->hasil_screening_hiv,
            'hasil_screening_sifilis' => $request->hasil_screening_sifilis,
            'tgl_masuk_pdp' => $request->tgl_masuk_pdp,
            'tgl_mulai_arv' => $request->tgl_mulai_arv,
            'ditangani_sifilis' => $request->ditangani_sifilis,
            'obat_adequat' => $request->obat_adequat,
            'dirujuk' => $request->dirujuk,
            'status_hiv' => $request->status_hiv,
            'periksa_sifilis' => $request->periksa_sifilis,
            'faskes_rujukan' => $request->faskes_rujukan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_showppia(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tanggal_screening_hbsag' => 'required',
            'tanggal_screening_hiv' => 'required',
            'tanggal_screening_sifilis' => 'required',
            'kode_specimen_hbsag' => 'required',
            'kode_specimen_hiv' => 'required',
            'kode_specimen_sifilis' => 'required',
            'hasil_screening_hbsag' => 'required',
            'hasil_screening_hiv' => 'required',
            'hasil_screening_sifilis' => 'required',
            'tgl_masuk_pdp' => 'required',
            'tgl_mulai_arv' => 'required',
            'ditangani_sifilis' => 'required',
            'obat_adequat' => 'required',
            'dirujuk' => 'required',
            'status_hiv' => 'required',
            'periksa_sifilis' => 'required',
            'faskes_rujukan' => 'required',

        ]);
        $ppias = Show_Ppia::findOrFail($id);
        $ppias->update([
            'tanggal_screening_hbsag' => $request->tanggal_screening_hbsag,
            'tanggal_screening_hiv' => $request->tanggal_screening_hiv,
            'tanggal_screening_sifilis' => $request->tanggal_screening_sifilis,
            'kode_specimen_hbsag' => $request->kode_specimen_hbsag,
            'kode_specimen_hiv' => $request->kode_specimen_hiv,
            'kode_specimen_sifilis' => $request->kode_specimen_sifilis,
            'hasil_screening_hbsag' => $request->hasil_screening_hbsag,
            'hasil_screening_hiv' => $request->hasil_screening_hiv,
            'hasil_screening_sifilis' => $request->hasil_screening_sifilis,
            'tgl_masuk_pdp' => $request->tgl_masuk_pdp,
            'tgl_mulai_arv' => $request->tgl_mulai_arv,
            'ditangani_sifilis' => $request->ditangani_sifilis,
            'obat_adequat' => $request->obat_adequat,
            'dirujuk' => $request->dirujuk,
            'status_hiv' => $request->status_hiv,
            'periksa_sifilis' => $request->periksa_sifilis,
            'faskes_rujukan' => $request->faskes_rujukan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function edit_showppia($id)
    {
        $ppias = Show_Ppia::findOrFail($id);
        return response()->json($ppias);
    }

    ///////  PEMANTAUAN BAYI ///////

    public function pemantauan_bayi()
    {
        $ibus = Anc::all();
        $pb = Pemantauan_Bayi::all();
        return view('postnatal_care.pemantauan_bayi', compact('ibus', 'pb'));
    }

    public function store_pemantauan_bayi(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
        ]);
        Pemantauan_Bayi::create([
            'NIK' => $request->NIK,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_pemantauan_bayi()
    {
        $pb = Pemantauan_Bayi::select('*');
        return DataTables::of($pb)->make(true);
    }
    public function destroy_pemantauan_bayi($id)
    {
        try {
            $pb = Pemantauan_Bayi::findOrFail($id);
            $pb->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus']);
        }
    }

    ///////  PEMANTAUAN BAYI IBU HEPATITIS B ///////

    public function show_hepatitis($id)
    {
        $pb = Pemantauan_Bayi::findOrFail($id);
        $NIK = $pb->NIK;
        $hepatitis = Show_Hepatitis::where('NIK', $NIK)->get();

        foreach ($hepatitis as $item) {
            $item->hbo = Carbon::parse($item->hbo)->format('d-m-Y / H:i');
            $item->hb2 = Carbon::parse($item->hb2)->format('d-m-Y / H:i');
            $item->hbig = Carbon::parse($item->hbig)->format('d-m-Y / H:i');
            $item->hb3 = Carbon::parse($item->hb3)->format('d-m-Y / H:i');
            $item->hb1 = Carbon::parse($item->hb1)->format('d-m-Y / H:i');
            $item->tanggal_hbsag = Carbon::parse($item->tanggal_hbsag)->format('d-m-Y / H:i');
            $item->tanggal_antihbs = Carbon::parse($item->tanggal_antihbs)->format('d-m-Y / H:i');
        }

        return view('postnatal_care.show_hepatitis', compact('pb', 'hepatitis'));
    }
    public function store_showhepatitis(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'hbo' => 'required',
            'hb2' => 'required',
            'hbig' => 'required',
            'hb3' => 'required',
            'hb1' => 'required',
            'tanggal_hbsag' => 'required',
            'hasil_hbsag' => 'required',
            'tanggal_antihbs' => 'required',
            'hasil_antihbs' => 'required',
        ]);

        Show_hepatitis::create([
            'NIK' => $request->NIK,
            'hbo' => $request->hbo,
            'hb2' => $request->hb2,
            'hbig' => $request->hbig,
            'hb3' => $request->hb3,
            'hb1' => $request->hb1,
            'tanggal_hbsag' => $request->tanggal_hbsag,
            'hasil_hbsag' => $request->hasil_hbsag,
            'tanggal_antihbs' => $request->tanggal_antihbs,
            'hasil_antihbs' => $request->hasil_antihbs,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_showhepatitis(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'hbo' => 'required',
            'hb2' => 'required',
            'hbig' => 'required',
            'hb3' => 'required',
            'hb1' => 'required',
            'tanggal_hbsag' => 'required',
            'hasil_hbsag' => 'required',
            'tanggal_antihbs' => 'required',
            'hasil_antihbs' => 'required',

        ]);
        $hepatitis = Show_Hepatitis::findOrFail($id);
        $hepatitis->update([
            'hbo' => $request->hbo,
            'hb2' => $request->hb2,
            'hbig' => $request->hbig,
            'hb3' => $request->hb3,
            'hb1' => $request->hb1,
            'tanggal_hbsag' => $request->tanggal_hbsag,
            'hasil_hbsag' => $request->hasil_hbsag,
            'tanggal_antihbs' => $request->tanggal_antihbs,
            'hasil_antihbs' => $request->hasil_antihbs,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function edit_showhepatitis($id)
    {
        $hepatitis = Show_Hepatitis::findOrFail($id);
        return response()->json($hepatitis);
    }

    ///////  PEMANTAUAN BAYI IBU HIV ///////

    public function show_hiv($id)
    {

        return view('postnatal_care.show_hiv');
    }
    ///////  PEMANTAUAN BAYI IBU SIFILIS ///////

    public function show_sifilis($id)
    {

        return view('postnatal_care.show_sifilis');
    }
}
