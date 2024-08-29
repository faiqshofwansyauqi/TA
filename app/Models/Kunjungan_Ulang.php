<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KB;

class Kunjungan_Ulang extends Model
{
    protected $table = 'kunjungan_ulang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kb',
        'tgl_dilayani',
        'berat_badan',
        'tkn_darah',
        'interval',
        'tgl_kembali',     
    ];
    public function KB()
    {
        return $this->belongsTo(KB::class, 'id_kb', 'id');
    }
}
