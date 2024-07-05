<?php

namespace App\Models;

use App\Models\Anak;
use App\Models\Ropb;
use App\Models\Rencana_Persalinan;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    protected $table = 'ibu';
    protected $primaryKey = 'id_ibu';

    protected $fillable = [
        'user_id',
        'puskesmas',
        'noregis',
        'nama_ibu',
        'nama_suami',
        'tanggal_lahir',
        'alamat_domisili',
        'desa',
        'kab',
        'pendidikan_ibu',
        'pekerjaaan_ibu',
        'nik',
        'umur',
        'rtrw',
        'kec',
        'prov',
        'agama',
        'tanggal_reg',
        'posyandu',
        'nama_kader',
        'nama_dukum',
        'jamkesmas',
        'gol_darah',
        'telp',
    ];
    public function ropb()
    {
        return $this->hasMany(Ropb::class, 'id_ibu');
    }
    public function rnca_persalinan()
    {
        return $this->hasMany(Rencana_Persalinan::class, 'id_ibu');
    }
    public $timestamps = false;
}
