<?php

namespace App\Models;

use App\Models\Anak;
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
    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_ibu', 'nama_ibu');
    }
    public $timestamps = false;
}
