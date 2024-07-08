<?php

namespace App\Models;

use App\Models\Ibu;
use App\Models\KMS;
use App\Models\Show_Kms;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    protected $primaryKey = 'id_anak';
    protected $fillable = [
        'user_id',
        'id_ibu',
        'nama_anak',
        'nama_suami',
        'alamat',
        'kec',
        'kab',
        'jenis_kelamin',
        'jenis_kelahiran',
        'anak_ke',
        'berat_bayi',
        'panjang_bayi',
        'bayi_lahir',
        'tempat',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
    public function kms()
    {
        return $this->hasMany(KMS::class, 'id_anak');
    }
    public function show_kms()
    {
        return $this->hasMany(Show_Kms::class, 'id_anak');
    }
    public $timestamps = false;
}
