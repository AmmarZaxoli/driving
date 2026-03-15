<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Coach extends Authenticatable
{
    protected $table = 'coaches';

    protected $fillable = [
        'name',
        'mobile',
        'address',
        'numberid',
        'password',
        'datenumberidexpiry',
    ];

    protected $hidden = [
        'password',
    ];
}