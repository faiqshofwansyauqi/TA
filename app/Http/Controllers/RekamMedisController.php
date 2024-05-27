<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persalinan;
use App\Models\Ibu;
use App\Models\Ropb;
use App\Models\Tm1;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
{
    //////// PERSALINAN ////////
    public function Persalinan()
    {
        $persalinan = Persalinan::all();
        $ibus = Ibu::all();
        return view('rekam_medis.persalinan', compact('persalinan', 'ibus'));
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
            'rujuk' => 'required',
            'alamat_bersalin' => 'required',
        ]);
        $persalinan = Persalinan::findOrFail($id);
        $persalinan->update([
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
            'rujuk' => $request->rujuk,
            'alamat_bersalin' => $request->alamat_bersalin,
        ]);
        return redirect()->back()->with('success', 'Data persalinan berhasil diperbarui');
    }
    public function destroy_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::findOrFail($id_persalinan);
        $persalinan->delete();

        return redirect()->back()->with('success', 'Data persalinan berhasil dihapus');
    }
    public function getData_persalinan()
    {
        $persalinan = Persalinan::select('*');

        return DataTables::of($persalinan)->make(true);
    }
    public function edit_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::findOrFail($id_persalinan);
        return response()->json($persalinan);
    }
    public function show_persalinan($id_persalinan)
    {
        $persalinan = Persalinan::with(['ibu' => function ($query) {
            $query->select('nama_ibu');
        }])->find($id_persalinan);
        return response()->json($persalinan);
    }

    //////// RIWAYAT OBSTETRIK DAN PEMERIKSAAN BIDAN ////////

    public function Ropb()
    {
        $ropb = Ropb::all();
        $ibus = Ibu::all();;
        return view('rekam_medis.ropb', compact('ropb', 'ibus'));
    }
    public function store_ropb(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'gravida' => 'required',
            'partus' => 'required',
            'abortus' => 'required',
            'hidup' => 'required',
            'rwyt_komplikasi' => 'required',
            'pnykt_kronis_alergi' => 'required',
            'tgl_periksa' => 'required',
            'tgl_hpht' => 'required',
            'tksrn_persalinan' => 'required',
            'prlnan_sebelum' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'buku_kia' => 'required',
            'tgl_persalinan' => 'required',
            'penolong' => 'required',
            'tempat' => 'required',
            'pendamping' => 'required',
            'transport' => 'required',
            'pendonor' => 'required',
            'pendonor_darah' => 'required',
        ]);

        Ropb::create([
            'NIK' => $request->NIK,
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
    public function update_ropb(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'gravida' => 'required',
            'partus' => 'required',
            'abortus' => 'required',
            'hidup' => 'required',
            'rwyt_komplikasi' => 'required',
            'pnykt_kronis_alergi' => 'required',
            'tgl_periksa' => 'required',
            'tgl_hpht' => 'required',
            'tksrn_persalinan' => 'required',
            'prlnan_sebelum' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'buku_kia' => 'required',
            'tgl_persalinan' => 'required',
            'penolong' => 'required',
            'tempat' => 'required',
            'pendamping' => 'required',
            'transport' => 'required',
            'pendonor' => 'required',
        ]);
        $ropb = Ropb::findOrFail($id);
        $ropb->update([
            'NIK' => $request->NIK,
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
            'tgl_persalinan' => $request->tgl_persalinan,
            'penolong' => $request->penolong,
            'tempat' => $request->tempat,
            'pendamping' => $request->pendamping,
            'transport' => $request->transport,
            'pendonor' => $request->pendonor,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }
    public function getData_ropb()
    {
        $ropb = Ropb::select('*');

        return DataTables::of($ropb)->make(true);
    }
    public function destroy_ropb($id)
    {
        $ropb = Ropb::findOrFail($id);
        $ropb->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    public function edit_ropb($id)
    {
        $ropb = Ropb::findOrFail($id);
        return response()->json($ropb);
    }
    public function show_ropb($id)
    {
        $ropb = Ropb::with(['ibu' => function ($query) {
            $query->select('nama_ibu');
        }])->find($id);
        return response()->json($ropb);
    }

    //////// PEMERIKSAAN DOKTER TM 1 ////////


    public function Tm1()
    {
        $ibus = Ibu::all();
        $tm1 = Tm1::all();
        return view('rekam_medis.tm1', compact('tm1', 'ibus'));
    }
    public function store_tm1(Request $request)
    {
        // dd($request);
        $request->validate([
            'NIK' => 'required',
            'konjungtiva' => 'required',
            'sklera' => 'required',
            'kulit' => 'required',
            'leher'  => 'required',
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
            'leher'  => $request->leher,
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
            'leher'  => 'required',
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
            'leher'  => $request->leher,
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
        $tm1 = Tm1::with(['ibu' => function ($query) {
            $query->select('nama_ibu');
        }])->find($id);
        return response()->json($tm1);
    }
}
