<?php

namespace App\Models;

use App\Models\Ibu;
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
        'detail_integrasi',
        'komplikasi',
        'keadaan_tiba',
        'keadaan_pulang',
        'rujuk',
        'alamat_bersalin',
        'id_ibu'
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu', 'nama_ibu');
    }
    public $timestamps = false;
}
