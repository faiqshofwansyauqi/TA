<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Anc extends Model
{
    protected $table = 'anc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',    
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}