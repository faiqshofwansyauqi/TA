<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use App\Models\Anak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahIbu = Ibu::count();
        $jumlahAnak = Anak::count();
        return view('dashboard.index', compact('jumlahAnak', 'jumlahIbu'));
    }
    public function ERROR()
    {
        return view('errors.404');
    }

}
