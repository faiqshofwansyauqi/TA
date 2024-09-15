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
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function puskesmas(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole(['IBI', 'Puskesmas'])) {
            $year = $request->input('year', now()->year);
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
                $laporan[$monthNumber] = [
                    'bulan' => $monthName,
                    'anc' => $this->getMonthlyCount(Anc::class, $monthNumber, $year),
                    'persalinan' => $this->getMonthlyCount(Persalinan::class, $monthNumber, $year, 'tgl_datang'),
                    'anak' => $this->getMonthlyCount(Anak::class, $monthNumber, $year),
                    'bulan_ini_k1' => $this->getMonthlyCount(Ropb::class, $monthNumber, $year, 'tgl_periksa'),
                    'bulan_lalu_k1' => $monthNumber > 1 ? $this->getMonthlyCount(Ropb::class, $monthNumber - 1, $year, 'tgl_periksa') : 0,
                    'bulan_ini_k2' => $this->getMonthlyCount(Show_Anc::class, $monthNumber, $year, 'tanggal', ['trimester' => 'III']),
                    'bulan_lalu_k2' => $monthNumber > 1 ? $this->getMonthlyCount(Show_Anc::class, $monthNumber - 1, $year, 'tanggal', ['trimester' => 'III']) : 0,
                    'kn1l_bulan_ini' => $this->getNifasCount($monthNumber, $year, 1, 'Laki-laki'),
                    'kn1p_bulan_ini' => $this->getNifasCount($monthNumber, $year, 1, 'Perempuan'),
                    'kn1p_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 1, 'Perempuan') : 0,
                    'kn1l_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 1, 'Laki-laki') : 0,
                    'kn2l_bulan_ini' => $this->getNifasCount($monthNumber, $year, 2, 'Laki-laki'),
                    'kn2p_bulan_ini' => $this->getNifasCount($monthNumber, $year, 2, 'Perempuan'),
                    'kn2p_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 2, 'Perempuan') : 0,
                    'kn2l_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 2, 'Laki-laki') : 0,
                ];
            }
            return view('laporan.puskesmas', compact('laporan', 'user'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }
    }

    public function exportPdf(Request $request)
    {
        $user = Auth::user();
        $year = $request->input('year', now()->year);
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
            $laporan[$monthNumber] = [
                'bulan' => $monthName,
                'anc' => $this->getMonthlyCount(Anc::class, $monthNumber, $year),
                'persalinan' => $this->getMonthlyCount(Persalinan::class, $monthNumber, $year, 'tgl_datang'),
                'anak' => $this->getMonthlyCount(Anak::class, $monthNumber, $year),
                'bulan_ini_k1' => $this->getMonthlyCount(Ropb::class, $monthNumber, $year, 'tgl_periksa'),
                'bulan_lalu_k1' => $monthNumber > 1 ? $this->getMonthlyCount(Ropb::class, $monthNumber - 1, $year, 'tgl_periksa') : 0,
                'bulan_ini_k2' => $this->getMonthlyCount(Show_Anc::class, $monthNumber, $year, 'tanggal', ['trimester' => 'III']),
                'bulan_lalu_k2' => $monthNumber > 1 ? $this->getMonthlyCount(Show_Anc::class, $monthNumber - 1, $year, 'tanggal', ['trimester' => 'III']) : 0,
                'kn1l_bulan_ini' => $this->getNifasCount($monthNumber, $year, 1, 'Laki-laki'),
                'kn1p_bulan_ini' => $this->getNifasCount($monthNumber, $year, 1, 'Perempuan'),
                'kn1p_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 1, 'Perempuan') : 0,
                'kn1l_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 1, 'Laki-laki') : 0,
                'kn2l_bulan_ini' => $this->getNifasCount($monthNumber, $year, 2, 'Laki-laki'),
                'kn2p_bulan_ini' => $this->getNifasCount($monthNumber, $year, 2, 'Perempuan'),
                'kn2p_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 2, 'Perempuan') : 0,
                'kn2l_bulan_lalu' => $monthNumber > 1 ? $this->getNifasCount($monthNumber - 1, $year, 2, 'Laki-laki') : 0,
            ];
        }
        $pdf = PDF::loadView('laporan.puskesmas_pdf', compact('laporan', 'year', 'user'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('laporan-ibu-hamil-' . $year . '.pdf');
    }

    private function getMonthlyCount($model, $month, $year, $dateField = 'created_at', $conditions = [])
    {
        $query = $model::whereMonth($dateField, $month)->whereYear($dateField, $year);
        foreach ($conditions as $field => $value) {
            $query->where($field, $value);
        }
        return $query->count();
    }

    private function getNifasCount($month, $year, $kf, $gender)
    {
        return Show_Nifas::whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->where('kf', $kf)
            ->whereIn('id_ibu', function ($query) use ($gender) {
                $query->select('id_ibu')->from('anak')->where('jenis_kelamin', $gender);
            })
            ->count();
    }
}
