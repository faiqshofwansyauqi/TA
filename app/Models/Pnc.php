<?php

namespace App\Models;

use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Pnc extends Model
{
    protected $table = 'pnc';
    protected $primaryKey = 'id_pnc';
    protected $fillable = [
        'id_ibu'
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu', 'nama_ibu');
    }
    public $timestamps = false;
}
