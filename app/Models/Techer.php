<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techer extends Model
{
    use HasFactory;

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

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function absents()
    {
        return $this->hasMany(Absent::class, 'techer_id');
    }
}
