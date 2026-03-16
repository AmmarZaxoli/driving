<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = [
        'student_id',
        'absent',
        'date_day',
        'coach_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
