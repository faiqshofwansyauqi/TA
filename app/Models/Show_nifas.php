<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Show_Nifas extends Model
{
    protected $table = 'show_nifas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_ibu',
        'tanggal',
        'hari',
        'kf',
        'td_mmhg',
        'suhu',
        'buku_kia',
        'fe',
        'vit',
        'cd_4',
        'anti_malaria',
        'anti_tb',
        'arv',
        'ppp',
        'infeksi',
        'hdk',
        'lainnya_komplikasi',
        'klasifikasi',
        'tata_laksana',
        'puskesmas',
        'klinik',
        'rsia_rsb',
        'rs',
        'lain_lain_dirujuk',
        'tiba',
        'pulang',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
