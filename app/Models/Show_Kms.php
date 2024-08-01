<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;
use App\Models\Anak;
use App\Models\KMS;

class Show_Kms extends Model
{
    protected $table = 'show_kms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_anak',
        'id_ibu',
        'tanggal',
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
    public function kms()
    {
        return $this->belongsTo(KMS::class, 'id_ibu', 'id_ibu');
    }
}
