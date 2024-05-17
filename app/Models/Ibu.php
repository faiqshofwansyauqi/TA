<?php

namespace App\Models;
use App\Models\Anak;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    protected $table = 'ibu';
    protected $primaryKey = 'id_ibu';


    protected $fillable = [
        'tanggal_terdaftar',
        'nama_ibu',
        'alamat',
        'usia_ibu',
        'tempat_tanggal_lahir',
        'nomer_telepon',
        'gol_darah',
    ];
    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_ibu','nama_ibu');
    }
    public $timestamps = false;
}
