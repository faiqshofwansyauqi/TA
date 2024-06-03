<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibu;
use App\Models\Ropb;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
{

    //////// RIWAYAT OBSTETRIK DAN PEMERIKSAAN BIDAN ////////

    public function Ropb()
    {
        $ropb = Ropb::all();
        $ibus = Ibu::all();
        ;
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
        $ropb = Ropb::with([
            'ibu' => function ($query) {
                $query->select('nama_ibu');
            }
        ])->find($id);
        return response()->json($ropb);
    }

}