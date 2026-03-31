<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = [
        'student_id',
        'techer_id',
        'status',
        'date',
        'reason',
        'namegroup'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function techer()
    {
        return $this->belongsTo(Account::class);
    }
}
