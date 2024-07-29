<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;
use App\User;

class Anc extends Model
{
    protected $table = 'anc';
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}