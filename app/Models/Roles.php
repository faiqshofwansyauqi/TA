<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Roles extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'email',
    ];

}
