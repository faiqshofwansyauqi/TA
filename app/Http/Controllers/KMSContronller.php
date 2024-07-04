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
            $anaks = Anak::where('user_id', $user->id)->get();
            return view('kms.kms', compact('anaks'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function getInfo_anak($nama_anak)
    {
        $anak = Anak::where('nama_anak', $nama_anak)->first();
        return response()->json($anak);
    }
    public function store_kms(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'nama_ibu' => 'required',
        ]);

        KMS::create([
            'user_id' => Auth::id(),
            'nama_anak' => $request->nama_anak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ibu' => $request->nama_ibu,
        ]);

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan');
    }
    public function getData_kms()
    {
        $kms = KMS::where('user_id', Auth::id())->select('*');
        return DataTables::of($kms)->make(true);
    }

    ////////// SHOW KMS //////////

    public function show_kms($id)
    {
        $user = Auth::user();
        if ($user->hasRole(['Bidan'])) {
            $this->authorize('akses_page', Show_Kms::class);
            $kms = KMS::findOrFail($id);
            $anaks = Anak::all();
            $nama_anak = $kms->nama_anak;
            $kmss = Show_Kms::where('nama_anak', $nama_anak)->get();
            return view('kms.show_kms', compact('kms', 'anaks', 'kmss'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }
    public function store_show_kms(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_anak' => 'required',
            'bulan_penimbangan' => 'required',
            'berat_badan' => 'required',
            'nt' => 'required',
            'asi_eksklusif',
        ]);
        $bulan_penimbangan = Carbon::createFromFormat('Y-m-d', $request->bulan_penimbangan)->format('d - m - Y');
        Show_Kms::create([
            'user_id' => Auth::id(),
            'nama_anak' => $request->nama_anak,
            'bulan_penimbangan' => $bulan_penimbangan,
            'berat_badan' => $request->berat_badan,
            'nt' => $request->nt,
            'asi_eksklusif' => $request->asi_eksklusif,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }



}
