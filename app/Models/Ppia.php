<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Ppia extends Model
{
    protected $table = 'ppia';
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
