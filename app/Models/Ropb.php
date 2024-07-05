<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;
class Ropb extends Model
{
    protected $table = 'ropb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_ibu',
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
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
