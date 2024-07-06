<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Nifas extends Model
{
    protected $table = 'nifas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',    
        'user_id',
        'id_ibu',    
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
