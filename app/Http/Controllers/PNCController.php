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
            $ibus = Persalinan::with('ibu')->where('user_id', $user->id)->get();
            return view('postnatal_care.nifas', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_nifas(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu' => 'required',
        ]);

        Nifas::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_nifas()
    {
        $nifas = Nifas::where('user_id', Auth::id())->select('*');
        return DataTables::of($nifas)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
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
            'id_ibu',
            'tanggal',
            'hari',
            'kf',
            'td_mmhg',
            'suhu',
            'buku_kia',
            'fe',
            'vit',
            'cd_4',
            'anti_malaria',
            'anti_tb',
            'arv',
            'ppp',
            'infeksi',
            'hdk',
            'lainnya_komplikasi',
            'klasifikasi',
            'tata_laksana',
            'puskesmas',
            'klinik',
            'rsia_rsb',
            'rs',
            'lain_lain_dirujuk',
            'tiba',
            'pulang',
        ]);

        Show_Nifas::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
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
    public function getData_shownifas($id_ibu)
    {
        $data = Show_Nifas::where('id_ibu', $id_ibu)->get();
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
            $this->authorize('akses_page', Show_Ppia::class);
            $ibus = Anc::with('ibu')->where('user_id', $user->id)->get();
            return view('postnatal_care.ppia', compact('ibus'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_ppia(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ibu',
        ]);
        Show_Ppia::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_ppia()
    {
        $ppia = Show_Ppia::where('user_id', Auth::id())->select('*');
        return DataTables::of($ppia)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }

    ///////  PEMANTAUAN SHOW PPIA ///////

    public function show_ppia($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Ppia::class);
            $ppia = Show_Ppia::findOrFail($id);
            $id_ibu = $ppia->id_ibu;
            $ppias = Show_Ppia::with('ibu')->where('user_id', $user->id)->get();
            return view('postnatal_care.show_ppia', compact('ppias', 'ppia'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function update_showppia(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tanggal_screening_hbsag',
            'tanggal_screening_hiv',
            'tanggal_screening_sifilis',
            'kode_specimen_hbsag',
            'kode_specimen_hiv',
            'kode_specimen_sifilis',
            'hasil_screening_hbsag',
            'hasil_screening_hiv',
            'hasil_screening_sifilis',
            'tgl_masuk_pdp',
            'tgl_mulai_arv',
            'ditangani_sifilis',
            'obat_adequat',
            'dirujuk',
            'status_hiv',
            'periksa_sifilis',
            'faskes_rujukan',

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
            $ibus = Show_Ppia::with('ibu')->where('user_id', $user->id)->get();
            return view('postnatal_care.pemantauan_bayi', compact('ibus', ));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_pemantauan_bayi(Request $request)
    {
        $request->validate([
            'id_ibu',
        ]);
        Show_hepatitis::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        Show_Hiv::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        Show_Sifilis::create([
            'user_id' => Auth::id(),
            'id_ibu' => $request->id_ibu,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function getData_pemantauan_bayi()
    {
        $pemantauan_bayi = Show_Hepatitis::where('user_id', Auth::id())->select('*');
        return DataTables::of($pemantauan_bayi)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->make(true);
    }


    ///////  PEMANTAUAN BAYI IBU HEPATITIS B ///////

    public function show_hepatitis($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Hepatitis::class);
            $hepatitis = Show_Hepatitis::findOrFail($id);
            $id_ibu = $hepatitis->id_ibu;
            $hepatitiss = Show_Hepatitis::with('ibu')->where('user_id', $user->id)->get();

            foreach ($hepatitiss as $item) {
                $item->hbo = $item->hbo ? Carbon::parse($item->hbo)->format('d/m/Y H:i') : null;
                $item->hb2 = $item->hb2 ? Carbon::parse($item->hb2)->format('d/m/Y H:i') : null;
                $item->hbig = $item->hbig ? Carbon::parse($item->hbig)->format('d/m/Y H:i') : null;
                $item->hb3 = $item->hb3 ? Carbon::parse($item->hb3)->format('d/m/Y H:i') : null;
                $item->hb1 = $item->hb1 ? Carbon::parse($item->hb1)->format('d/m/Y H:i') : null;
                $item->tanggal_hbsag = $item->tanggal_hbsag ? Carbon::parse($item->tanggal_hbsag)->format('d/m/Y H:i') : null;
                $item->tanggal_antihbs = $item->tanggal_antihbs ? Carbon::parse($item->tanggal_antihbs)->format('d/m/Y H:i') : null;
            }
            return view('postnatal_care.show_hepatitis', compact('hepatitiss', 'hepatitis'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function update_showhepatitis(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'hbo',
            'hb2',
            'hbig',
            'hb3',
            'hb1',
            'tanggal_hbsag',
            'hasil_hbsag',
            'tanggal_antihbs',
            'hasil_antihbs',

        ]);
        $hepatitiss = Show_Hepatitis::findOrFail($id);
        $hepatitiss->update([
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
        $hepatitiss = Show_Hepatitis::findOrFail($id);
        return response()->json($hepatitiss);
    }

    ///////  PEMANTAUAN BAYI IBU HIV ///////

    public function show_hiv($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Hiv::class);
            $hiv = Show_Hiv::findOrFail($id);
            $id_ibu = $hiv->id_ibu;
            $hivs = Show_Hiv::with('ibu')->where('user_id', $user->id)->get();

            foreach ($hivs as $item) {
                $item->tgl_pemberian_arv = $item->tgl_pemberian_arv ? Carbon::parse($item->tgl_pemberian_arv)->format('d/m/Y') : null;
                $item->tgl_bds = $item->tgl_bds ? Carbon::parse($item->tgl_bds)->format('d/m/Y') : null;
                $item->tgl_konfirmasi_bds = $item->tgl_konfirmasi_bds ? Carbon::parse($item->tgl_konfirmasi_bds)->format('d/m/Y') : null;
                $item->tgl_pemeriksaan_balita = $item->tgl_pemeriksaan_balita ? Carbon::parse($item->tgl_pemeriksaan_balita)->format('d/m/Y') : null;
                $item->tgl_perawatan_pdp = $item->tgl_perawatan_pdp ? Carbon::parse($item->tgl_perawatan_pdp)->format('d/m/Y') : null;
                $item->tgl_pengobatan_arv = $item->tgl_pengobatan_arv ? Carbon::parse($item->tgl_pengobatan_arv)->format('d/m/Y') : null;
            }
            return view('postnatal_care.show_hiv', compact('hivs', 'hiv'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function update_showhiv(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'tgl_pemberian_arv',
            'hasil_pemberian_arv',
            'tgl_bds',
            'hasil_bds',
            'tgl_konfirmasi_bds',
            'hasil_konfirmasi_bds',
            'tgl_pemeriksaan_balita',
            'hasil_pemeriksaan_balita',
            'tgl_perawatan_pdp',
            'hasil_perawatan_pdp',
            'tgl_pengobatan_arv',
            'hasil_pengobatan_arv',

        ]);
        $hivs = Show_Hiv::findOrFail($id);
        $hivs->update([
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
        $hivs = Show_Hiv::findOrFail($id);
        return response()->json($hivs);
    }

    ///////  PEMANTAUAN BAYI IBU SIFILIS ///////

    public function show_sifilis($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_sifilis::class);
            $sifilis = Show_Sifilis::findOrFail($id);
            $id_ibu = $sifilis->id_ibu;
            $sifiliss = Show_Sifilis::with('ibu')->where('user_id', $user->id)->get();
            return view('postnatal_care.show_sifilis', compact('sifiliss', 'sifilis'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function update_showsifilis(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'sifilis_dirujuk',
            'periksa_sifilis',
            'hasil_sifilis',

        ]);
        $sifiliss = Show_Sifilis::findOrFail($id);
        $sifiliss->update([
            'sifilis_dirujuk' => $request->sifilis_dirujuk,
            'periksa_sifilis' => $request->periksa_sifilis,
            'hasil_sifilis' => $request->hasil_sifilis,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    public function edit_showsifilis($id)
    {
        $sifiliss = Show_Sifilis::findOrFail($id);
        return response()->json($sifiliss);
    }

}
