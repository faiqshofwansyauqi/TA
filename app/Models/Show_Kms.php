<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show_Kms extends Model
{
    protected $table = 'show_kms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_anak',
        'id_ibu',
        'bulan_penimbangan',
        'berat_badan',
        'nt',
        'asi_eksklusif',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
    public function anak()
    {
        return $this->belongsTo(Anak::class, 'id_anak');
    }
}
