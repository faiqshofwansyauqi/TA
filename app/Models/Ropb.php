<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ropb extends Model
{
    protected $table = 'ropb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',
        'gravida',
        'partus',
        'abortus',
        'hidup',
        'rwyt_komplikasi',
        'pnykt_kronis_alergi',
        'tgl_periksa',
        'tgl_hpht',
        'tksrn_persalinan',
        'prlnan_sebelum',
        'berat_badan',
        'tinggi_badan',
        'buku_kia',
        'tgl_persalinan',
        'penolong',
        'tempat',
        'pendamping',
        'transport',
        'pendonor',
    ];
}
