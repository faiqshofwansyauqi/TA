<?php

namespace App\Http\Controllers;

use App\Models\Show_Kms;
use Illuminate\Http\Request;
use App\Models\KMS;
use App\Models\Anak;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class KMSContronller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    ////////// KMS //////////
    public function Kms()
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', KMS::class);
            $anaks = Anak::with('ibu')->where('user_id', $user->id)->get();
            return view('kms.kms', compact('anaks'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function getInfo_anak($id_anak)
    {
        $anak = Anak::where('id_anak', $id_anak)->first();
        return response()->json($anak);
    }
    public function store_kms(Request $request)
    {
        $request->validate([
            'id_anak' => 'required',
            'jenis_kelamin' => 'required',
            'id_ibu' => 'required',
        ]);

        KMS::create([
            'user_id' => Auth::id(),
            'id_anak' => $request->id_anak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_ibu' => $request->id_ibu,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function getData_kms()
    {
        $kms = KMS::where('user_id', Auth::id())->select('*');
        return DataTables::of($kms)
            ->addColumn('nama_ibu', function ($row) {
                return $row->ibu ? $row->ibu->nama_ibu : 'N/A';
            })
            ->addColumn('nama_anak', function ($row) {
                return $row->anak ? $row->anak->nama_anak : 'N/A';
            })
            ->make(true);
    }

    ////////// SHOW KMS //////////

    public function show_kms($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Kms::class);
            $kms = KMS::findOrFail($id);
            if ($kms->user_id !== $user->id) {
                return redirect()->route('kms.kms')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            }
            $kmss = Show_Kms::with('ibu')->where('user_id', $user->id)->get();
            return view('kms.show_kms', compact('kms','kmss'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_show_kms(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_anak' => 'required',
            'id_ibu' => 'required',
            'tanggal' => 'required',
            'berat_badan' => 'required',
            'nt' => 'required',
            'asi_eksklusif',
        ]);
        Show_Kms::create([
            'user_id' => Auth::id(),
            'id_anak' => $request->id_anak,
            'id_ibu' => $request->id_ibu,
            'tanggal' => $request->tanggal,
            'berat_badan' => $request->berat_badan,
            'nt' => $request->nt,
            'asi_eksklusif' => $request->asi_eksklusif,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }



}
