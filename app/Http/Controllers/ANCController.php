<?php

namespace App\Http\Controllers;

use App\Models\Tm1;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ibu;

class ANCController extends Controller
{
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
}
