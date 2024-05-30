<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Show_Anc extends Model
{
    protected $table = 'show_anc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',    
        'id',    
        'tanggal',
        'usia_kehamilan',
        'trimester',
        'keluhan',
        'berat_badan',
        'td_mmhg',
        'lila',
        'sts_gizi',
        'tfu',
        'sts_imunisasi',
        'djj',
        'kpl_thd',
        'tbj',
        'presentasi',
        'jmlh_janin',
        'injeksi',
        'buku_kia',
        'fe',
        'pmt_bumil',
        'kelas_ibu',
        'konseling',    
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}
