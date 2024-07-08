<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;
use App\Models\Anak;

class KMS extends Model
{
    protected $table = 'kms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_ibu',
        'id_anak',
        'jenis_kelamin',
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
