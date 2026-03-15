<?php

namespace App\Models;

// ١. ئەڤێ ل جهێ Illuminate\Database\Eloquent\Model بکاربینە
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// ٢. دڤێت کلاسێ تە "extends Authenticatable" بیت
class Account extends Authenticatable
{
    use HasFactory, Notifiable;

   

    protected $fillable = [
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}