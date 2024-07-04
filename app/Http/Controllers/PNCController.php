<?php

namespace App\Http\Controllers;

use App\Models\Show_Hiv;
use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Pemantauan_Bayi;
use App\Models\ANC;
use App\Models\Nifas;
use App\Models\Ppia;
use App\Models\Show_Nifas;
use App\Models\Show_Ppia;
use App\Models\Show_Hepatitis;
use App\Models\Show_Sifilis;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PNCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //////// MASA NIFAS ////////

    public function Nifas()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Nifas::class);
            $ibus = Persalinan::where('user_id', $user->id)->get();
            return view('postnatal_care.nifas', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_nifas(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required',
        ]);

        Nifas::create([
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_nifas()
    {
        $nifas = Nifas::where('user_id', Auth::id())->select('*');

        return DataTables::of($nifas)->make(true);
    }

    /////// SHOW NIFAS ///////

    public function show_nifas($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Nifas::class);
            $nifas = Nifas::findOrFail($id);
            return view('postnatal_care.show_nifas', compact('nifas'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_shownifas(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
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
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
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
    public function getData_shownifas($nama_ibu)
    {
        $data = Show_Nifas::where('nama_ibu', $nama_ibu)->get();
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
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Ppia::class);
            $ibus = Anc::where('user_id', $user->id)->get();
            return view('postnatal_care.ppia', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_ppia(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required',
        ]);
        Ppia::create([
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_ppia()
    {
        $ppia = Ppia::where('user_id', Auth::id())->select('*');
        return DataTables::of($ppia)->make(true);
    }

    ///////  PEMANTAUAN SHOW PPIA ///////

    public function show_ppia($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Ppia::class);
            $ppia = Ppia::findOrFail($id);
            $nama_ibu = $ppia->nama_ibu;
            $ppias = Show_Ppia::where('user_id', $user->id)->get();
            return view('postnatal_care.show_ppia', compact('ppias', 'ppia'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_showppia(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
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
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
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
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Pemantauan_Bayi::class);
            $ibus = Ppia::where('user_id', $user->id)->get();
            return view('postnatal_care.pemantauan_bayi', compact('ibus', ));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_pemantauan_bayi(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required',
        ]);
        Pemantauan_Bayi::create([
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_pemantauan_bayi()
    {
        $pb = Pemantauan_Bayi::where('user_id', Auth::id())->select('*');
        return DataTables::of($pb)->make(true);
    }


    ///////  PEMANTAUAN BAYI IBU HEPATITIS B ///////

    public function show_hepatitis($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Hepatitis::class);
            $pb = Pemantauan_Bayi::findOrFail($id);
            $nama_ibu = $pb->nama_ibu;
            $hepatitis = Show_Hepatitis::where('user_id', $user->id)->get();

            foreach ($hepatitis as $item) {
                $item->hbo = Carbon::parse($item->hbo)->format('d M Y / H:i');
                $item->hb2 = Carbon::parse($item->hb2)->format('d M Y / H:i');
                $item->hbig = Carbon::parse($item->hbig)->format('d M Y / H:i');
                $item->hb3 = Carbon::parse($item->hb3)->format('d M Y / H:i');
                $item->hb1 = Carbon::parse($item->hb1)->format('d M Y / H:i');
                $item->tanggal_hbsag = Carbon::parse($item->tanggal_hbsag)->format('d M Y / H:i');
                $item->tanggal_antihbs = Carbon::parse($item->tanggal_antihbs)->format('d M Y / H:i');
            }
            return view('postnatal_care.show_hepatitis', compact('pb', 'hepatitis'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_showhepatitis(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
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
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
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
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Hiv::class);
            $pb = Pemantauan_Bayi::findOrFail($id);
            $nama_ibu = $pb->nama_ibu;
            $hiv = Show_Hiv::where('nama_ibu', $nama_ibu)->get();
            foreach ($hiv as $item) {
                $item->tgl_pemberian_arv = Carbon::parse($item->tgl_pemberian_arv)->format('d M Y');
                $item->tgl_bds = Carbon::parse($item->tgl_bds)->format('d M Y');
                $item->tgl_konfirmasi_bds = Carbon::parse($item->tgl_konfirmasi_bds)->format('d M Y');
                $item->tgl_pemeriksaan_balita = Carbon::parse($item->tgl_pemeriksaan_balita)->format('d M Y');
                $item->tgl_perawatan_pdp = Carbon::parse($item->tgl_perawatan_pdp)->format('d M Y');
                $item->tgl_pengobatan_arv = Carbon::parse($item->tgl_pengobatan_arv)->format('d M Y');
            }
            return view('postnatal_care.show_hiv', compact('pb', 'hiv'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_showhiv(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
            'tgl_pemberian_arv' => 'required',
            'hasil_pemberian_arv' => 'required',
            'tgl_bds' => 'required',
            'hasil_bds' => 'required',
            'tgl_konfirmasi_bds' => 'required',
            'hasil_konfirmasi_bds' => 'required',
            'tgl_pemeriksaan_balita' => 'required',
            'hasil_pemeriksaan_balita' => 'required',
            'tgl_perawatan_pdp' => 'required',
            'hasil_perawatan_pdp' => 'required',
            'tgl_pengobatan_arv' => 'required',
            'hasil_pengobatan_arv' => 'required',
        ]);

        Show_Hiv::create([
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
            'tgl_pemberian_arv' => $request->tgl_pemberian_arv,
            'hasil_pemberian_arv' => $request->hasil_pemberian_arv,
            'tgl_bds' => $request->tgl_bds,
            'hasil_bds' => $request->hasil_bds,
            'tgl_konfirmasi_bds' => $request->tgl_konfirmasi_bds,
            'hasil_konfirmasi_bds' => $request->hasil_konfirmasi_bds,
            'tgl_pemeriksaan_balita' => $request->tgl_pemeriksaan_balita,
            'hasil_pemeriksaan_balita' => $request->hasil_pemeriksaan_balita,
            'tgl_perawatan_pdp' => $request->tgl_perawatan_pdp,
            'hasil_perawatan_pdp' => $request->hasil_perawatan_pdp,
            'tgl_pengobatan_arv' => $request->tgl_pengobatan_arv,
            'hasil_pengobatan_arv' => $request->hasil_pengobatan_arv,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_showhiv(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tgl_pemberian_arv' => 'required',
            'hasil_pemberian_arv' => 'required',
            'tgl_bds' => 'required',
            'hasil_bds' => 'required',
            'tgl_konfirmasi_bds' => 'required',
            'hasil_konfirmasi_bds' => 'required',
            'tgl_pemeriksaan_balita' => 'required',
            'hasil_pemeriksaan_balita' => 'required',
            'tgl_perawatan_pdp' => 'required',
            'hasil_perawatan_pdp' => 'required',
            'tgl_pengobatan_arv' => 'required',
            'hasil_pengobatan_arv' => 'required',

        ]);
        $hiv = Show_Hiv::findOrFail($id);
        $hiv->update([
            'tgl_pemberian_arv' => $request->tgl_pemberian_arv,
            'hasil_pemberian_arv' => $request->hasil_pemberian_arv,
            'tgl_bds' => $request->tgl_bds,
            'hasil_bds' => $request->hasil_bds,
            'tgl_konfirmasi_bds' => $request->tgl_konfirmasi_bds,
            'hasil_konfirmasi_bds' => $request->hasil_konfirmasi_bds,
            'tgl_pemeriksaan_balita' => $request->tgl_pemeriksaan_balita,
            'hasil_pemeriksaan_balita' => $request->hasil_pemeriksaan_balita,
            'tgl_perawatan_pdp' => $request->tgl_perawatan_pdp,
            'hasil_perawatan_pdp' => $request->hasil_perawatan_pdp,
            'tgl_pengobatan_arv' => $request->tgl_pengobatan_arv,
            'hasil_pengobatan_arv' => $request->hasil_pengobatan_arv,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function edit_showhiv($id)
    {
        $hiv = Show_Hiv::findOrFail($id);
        return response()->json($hiv);
    }

    ///////  PEMANTAUAN BAYI IBU SIFILIS ///////

    public function show_sifilis($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_sifilis::class);
            $pb = Pemantauan_Bayi::findOrFail($id);
            $nama_ibu = $pb->nama_ibu;
            $sifilis = Show_Sifilis::where('user_id', $user->id)->get();
            return view('postnatal_care.show_sifilis', compact('pb', 'sifilis'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_showsifilis(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
            'sifilis_dirujuk' => 'required',
            'periksa_sifilis' => 'required',
            'hasil_sifilis' => 'required',
        ]);

        Show_Sifilis::create([
            'user_id' => Auth::id(),
            'nama_ibu' => $request->nama_ibu,
            'sifilis_dirujuk' => $request->sifilis_dirujuk,
            'periksa_sifilis' => $request->periksa_sifilis,
            'hasil_sifilis' => $request->hasil_sifilis,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update_showsifilis(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nama_ibu' => 'required',
            'sifilis_dirujuk' => 'required',
            'periksa_sifilis' => 'required',
            'hasil_sifilis' => 'required',

        ]);
        $sifilis = Show_Sifilis::findOrFail($id);
        $sifilis->update([
            'nama_ibu' => $request->nama_ibu,
            'sifilis_dirujuk' => $request->sifilis_dirujuk,
            'periksa_sifilis' => $request->periksa_sifilis,
            'hasil_sifilis' => $request->hasil_sifilis,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function edit_showsifilis($id)
    {
        $sifilis = Show_Sifilis::findOrFail($id);
        return response()->json($sifilis);
    }

}
