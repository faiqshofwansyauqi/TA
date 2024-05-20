<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persalinan extends Model
{
    protected $table = 'persalinan';
    protected $primaryKey = 'id_persalinan';
    protected $fillable = [
        'kala1',
        'kala2',
        'bayi_lahir',
        'piasenta',
        'pendarahan',
        'usia_kehamilan',
        'usia_hpht',
        'keadaan_ibu',
        'keadaan_bayi',
        'berat_bayi',
        'pesentasi',
        'tempat',
        'penolong',
        'cara_persalinan',
        'menejemen',
        'pelayanan',
        'integrasi',
        'komplikasi',
        'keadaan_tiba',
        'rujuk',
        'alamat_bersalin',
    ];
    public $timestamps = false;
}
