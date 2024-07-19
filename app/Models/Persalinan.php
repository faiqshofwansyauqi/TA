<?php

namespace App\Models;

use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Persalinan extends Model
{
    protected $table = 'persalinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_ibu',
        'tgl_datang',
        'usia_ibu',
        'alamat',
        'gravida',
        'partus',
        'abortus',
        'usia_hamil',
        'keadaan_ibu',
        'kala1',
        'kala2',
        'kala3',
        'tgl_lahir_bayi',
        'brt_bayi',
        'pnjg_bayi',
        'lngkr_kpl_bayi',
        'vit_k',
        'hbo',        
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
