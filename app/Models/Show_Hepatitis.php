<?php

namespace App\Models;
use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Show_Hepatitis extends Model
{
    protected $table = 'ibu_hepatitis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_ibu',
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
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
    
}
