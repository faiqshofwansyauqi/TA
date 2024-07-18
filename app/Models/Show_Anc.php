<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Show_Anc extends Model
{
    protected $table = 'show_anc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_ibu',
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
        'buku_kia',
        'fe',
        'pmt_bumil',
        'kelas_ibu',
        'konseling',
        'hemoglobin',
        'glcs_urine',
        'sifilis',
        'hbsag',
        'hiv',
        'arv',
        'skrining_anam',
        'dahak',
        'tbc',
        'obat_TB',
        'hdk',
        'abortus',
        'pendarahan',
        'infeksi',
        'kpd',
        'lain_lain_komplikasi',
        'tata_laksana',
        'puskesmas',
        'klinik',
        'rsia_rsb',
        'rs',
        'lain_lain_dirujuk',
        'tiba',
        'pulang',
        'keterangan',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
