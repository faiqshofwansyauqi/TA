<?php

namespace App\Http\Controllers;

use App\Models\Ropb;
use Illuminate\Http\Request;
use App\Models\Ibu;
use App\Models\Anc;


class LaporanController extends Controller
{
public function Lp_puskesmas()
    {
        $ibus = Anc::all();
        // dd($ibus);
        return view('laporan.ibu_hamil', compact('ibus'));
    }
}
