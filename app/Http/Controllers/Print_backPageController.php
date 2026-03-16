<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Print_backPageController extends Controller
{
    public function printSelectedStudents($ids)
    {
        $studentIds = explode(',', $ids);

        $students = Student::with('nationality')
            ->whereIn('id', $studentIds)
            ->limit(8)
            ->get();

        return view('print.selected-studentsBackPage', compact('students'));
    }
}
