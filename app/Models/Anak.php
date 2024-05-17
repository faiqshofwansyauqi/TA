<?php

namespace App\Models;

use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    protected $primaryKey = 'id_anak';


    protected $fillable = [
        'tanggal_terdaftar',
        'nama_anak',
        'usia_anak',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'anak_ke',
        'gol_darah',
        'id_ibu'
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu','nama_ibu');
    }
    public $timestamps = false;
}
