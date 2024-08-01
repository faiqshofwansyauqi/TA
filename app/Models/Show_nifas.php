<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;
use App\Models\Nifas;

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
        'fe',
        'vit',
        'ppp',
        'infeksi',
        'hdk',
        'lainnya_komplikasi',
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
    public function nifas()
    {
        return $this->belongsTo(Nifas::class, 'id_ibu', 'id_ibu');
    }
}
