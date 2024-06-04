<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Tm3 extends Model
{
    protected $table = 'tm3';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',
        'konjungtiva',
        'sklera',
        'kulit',
        'leher',
        'gigi_mulut',
        'tht',
        'jantung',
        'paru',
        'perut',
        'tungkai',
        'gs',
        'crl',
        'djj',
        'usia_kehamilan',
        'tkrsn_persalinan',
        'hb',
        'gula_darah',
        'gula_darah_pp',
        'konsultasi',
        'rekomendasi',
        'rnca_persalinan',
        'rnca_kontrasepsi',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}
