<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function Ibu()
    {
        return view('pasien.ibu');
    }

    public function Anak()
    {
        return view('pasien.anak');
    }
}
