<?php

namespace App\Models;

use App\Models\Anak;
use App\Models\Ropb;
use App\Models\Persalinan;
use App\Models\Anc;
use App\Models\Nifas;
use App\Models\Ppia;
use App\Models\Show_Anc;
use App\Models\Show_Nifas;
use App\Models\Show_Hepatitis;
use App\Models\Show_Hiv;
use App\Models\Show_Sifilis;
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
    public function show_anc()
    {
        return $this->hasMany(Show_Anc::class, 'id_ibu');
    }
    public function show_hapatitis()
    {
        return $this->hasMany(Show_Hepatitis::class, 'id_ibu');
    }
    public function show_hiv()
    {
        return $this->hasMany(Show_Hiv::class, 'id_ibu');
    }
    public function show_sifilis()
    {
        return $this->hasMany(Show_Sifilis::class, 'id_ibu');
    }
    public function ppia()
    {
        return $this->hasMany(Ppia::class, 'id_ibu');
    }
    public function show_nifas()
    {
        return $this->hasMany(Show_Nifas::class, 'id_ibu');
    }
    public function anc()
    {
        return $this->hasMany(Anc::class, 'id_ibu');
    }
    public function nifas()
    {
        return $this->hasMany(Nifas::class, 'id_ibu');
    }
    public function persalinan()
    {
        return $this->hasMany(Persalinan::class, 'id_ibu');
    }
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
