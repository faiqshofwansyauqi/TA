<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Pemantauan_Bayi extends Model
{
    protected $table = 'pemantauan_bayi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'NIK',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}
