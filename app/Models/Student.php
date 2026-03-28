<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mother_name',
        'birthday',
        'location',
        'mobile_number',

        'date_join',
        'date_dr_number',

        'invoice',

        'nationality_id',
        'coach_id',

        'number_car',

        'typecar',
        'learn',

        'status',

        'dateread',
        'time',
        'dayofpresence',
        'statuspresence',

        'datelearn',
        'stimelearn',
        'ftimelearn',
        'dayoflearn',

        'class',
    ];


    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }


    public function todayAbsent()
    {
        return $this->hasOne(StudentInfo::class)
            ->whereDate('date_day', now())
            ->where('absent', true);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}
