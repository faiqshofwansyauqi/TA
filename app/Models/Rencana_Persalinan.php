<?php

namespace App\Models;

use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Rencana_Persalinan extends Model
{
    protected $table = 'rnca_persalinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_ibu',
        'tgl_persalinan',
        'penolong',
        'tempat',
        'pendamping',
        'transport',
        'pendonor',
        'pendonor_darah',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
