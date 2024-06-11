<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show_Hepatitis extends Model
{
    protected $table = 'ibu_hepatitis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'NIK',
        'hbo',
        'hb2',
        'hbig',
        'hb3',
        'hb1',
        'tanggal_hbsag',
        'hasil_hbsag',
        'tanggal_antihbs',
        'hasil_antihbs',

    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
    
}
