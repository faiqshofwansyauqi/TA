<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Show_Sifilis extends Model
{
    protected $table = 'ibu_sifilis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_ibu',
        'sifilis_dirujuk',
        'periksa_sifilis',
        'hasil_sifilis',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'nama_ibu', 'nama_ibu');
    }
}
