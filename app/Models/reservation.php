<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
     protected $fillable = [
        'student_id', 'coach_id', 'date',
        'start_time', 'end_time', 'duration', 'status'
    ];

    protected $casts = ['date' => 'date'];

    public function student() { return $this->belongsTo(Student::class); }
    public function coach()   { return $this->belongsTo(Coach::class); }
}
