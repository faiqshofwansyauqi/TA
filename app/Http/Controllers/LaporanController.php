<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
public function Lp_puskesmas()
    {
        return view('laporan.puskesmas');
    }
}
