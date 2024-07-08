<?php

namespace App\Models;

use App\Models\Ibu;
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
    public $timestamps = false;
}
