<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KMS extends Model
{
    protected $table = 'kms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'nama_anak',        
        'jenis_kelamin',        
        'nama_ibu',        
    ];
}
