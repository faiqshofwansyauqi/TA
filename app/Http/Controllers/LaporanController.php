<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ropb;
use App\Models\Show_Nifas;
use App\Models\Anc;
use App\Models\Show_Anc;
use App\Models\Persalinan;
use App\Models\Anak;


class LaporanController extends Controller
{
    public function puskesmas()
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $laporan = [];

        foreach ($months as $monthNumber => $monthName) {
            // Get data for the current month
            $bulanIniK1 = Ropb::whereMonth('tgl_periksa', $monthNumber)
                ->whereYear('tgl_periksa', now()->year)
                ->count();

            $bulanLaluK1 = $monthNumber > 1 ? Ropb::whereMonth('tgl_periksa', $monthNumber - 1)
                ->whereYear('tgl_periksa', now()->year)
                ->count() : 0;

            $bulanIniK2 = Show_Anc::whereMonth('tanggal', $monthNumber)
                ->where('trimester', 'III')
                ->count();

            $bulanLaluK2 = $monthNumber > 1 ? Show_Anc::whereMonth('tanggal', $monthNumber - 1)
                ->where('trimester', 'III')
                ->count() : 0;

            $kn1p_bulan_ini = Show_Nifas::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '1')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Perempuan');
                })
                ->count();
                
            $kn1l_bulan_ini = Show_Nifas::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '1')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Laki-laki');
                })
                ->count();

            $kn1p_bulan_lalu = $monthNumber > 1 ? Show_Nifas::whereMonth('tanggal', $monthNumber - 1)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '1')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Perempuan');
                })
                ->count() : 0;

            $kn1l_bulan_lalu = $monthNumber > 1 ? Show_Nifas::whereMonth('tanggal', $monthNumber - 1)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '1')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Laki-laki');
                })
                ->count() : 0;

            $kn2p_bulan_ini = Show_Nifas::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '2')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Perempuan');
                })
                ->count();
                
            $kn2l_bulan_ini = Show_Nifas::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '2')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Laki-laki');
                })
                ->count();

            $kn2p_bulan_lalu = $monthNumber > 1 ? Show_Nifas::whereMonth('tanggal', $monthNumber - 1)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '2')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Perempuan');
                })
                ->count() : 0;

            $kn2l_bulan_lalu = $monthNumber > 1 ? Show_Nifas::whereMonth('tanggal', $monthNumber - 1)
                ->whereYear('tanggal', now()->year)
                ->where('kf', '2')
                ->whereIn('id_ibu', function ($query) {
                    $query->select('id_ibu')
                        ->from('anak')
                        ->where('jenis_kelamin', 'Laki-laki');
                })
                ->count() : 0;

            // Prepare report data
            $laporan[$monthNumber] = [
                'bulan' => $monthName,
                'anc' => Anc::whereMonth('created_at', $monthNumber)->count(),
                'persalinan' => Persalinan::whereMonth('tgl_datang', $monthNumber)->count(),
                'anak' => Anak::whereMonth('created_at', $monthNumber)->count(),
                'bulan_ini_k1' => $bulanIniK1,
                'bulan_lalu_k1' => $bulanLaluK1,
                'bulan_ini_k2' => $bulanIniK2,
                'bulan_lalu_k2' => $bulanLaluK2,
                'kn1l_bulan_ini' => $kn1l_bulan_ini,
                'kn1p_bulan_ini' => $kn1p_bulan_ini,
                'kn1p_bulan_lalu' => $kn1p_bulan_lalu,
                'kn1l_bulan_lalu' => $kn1l_bulan_lalu,
                'kn2l_bulan_ini' => $kn2l_bulan_ini,
                'kn2p_bulan_ini' => $kn2p_bulan_ini,
                'kn2p_bulan_lalu' => $kn2p_bulan_lalu,
                'kn2l_bulan_lalu' => $kn2l_bulan_lalu,
            ];
        }
        return view('laporan.puskesmas', compact('laporan'));
    }





}
