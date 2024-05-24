<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Tm1 extends Model
{
    protected $table = 'tm1';
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
        'skrining',
        'kesimpulan',
        'rekomendasi',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}
