<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show_Kms extends Model
{
    protected $table = 'show_kms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_anak',
        'bulan_penimbangan',
        'barat_badan',
        'nt',
        'asi_eksklusif',
    ];
}
