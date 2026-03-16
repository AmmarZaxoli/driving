<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'coach_id',
        'learn_type',
        'date_learn',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function learntype()
    {
        return $this->belongsTo(Learntype::class, 'learn_type');
    }
}
