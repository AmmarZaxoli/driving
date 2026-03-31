<?php

namespace App\Livewire\Student;

use App\Models\Absent;
use App\Models\Group;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Writeing extends Component
{
    public $reasons = [];
    public $groups = [];
    public $students = [];

    public $nameselected;
    public $name;

    public $arrayId = [];
    public $adddayofgroup = false;
    public $selectAll = false;

    public $groupday;
    public $groupdayselected;
    public $groupdays = [];

    public $dayoflearning;






    public function saveGroupDay()
    {
        if (empty($this->name)) {
            flash()->error('Please select a group');
            return;
        }

        if (empty($this->students)) {
            flash()->error('No students found in this group');
            return;
        }

        $date = $this->dayoflearning ?? now()->toDateString();

        $existingForDay = Absent::where('namegroup', $this->name)
            ->where('date', $date)
            ->exists();

        if ($existingForDay) {
            flash()->error('Attendance for this group on this day already exists.');
            return;
        }

        foreach ($this->students as $student) {

            // 0 = present (checked) | 1 = absent (not checked)
            $status = in_array($student->id, $this->arrayId) ? 0 : 1;

            Absent::create([
                'student_id' => $student->id,
                'techer_id'  => Auth::id(),
                'date'       => $date,
                'status'     => $status,
                'namegroup'  => $this->name,
                'reason'     => $this->reasons[$student->id] ?? null,
            ]);

            // increment ONLY when student is NOT checked
            if ($status === 1) {
                Student::where('id', $student->id)
                    ->increment('dayofpresence', 1);
            }
        }

        // increment group presentations
        Group::where('name', $this->name)->increment('presentations');

        flash()->success('Group day attendance saved successfully');

        $this->arrayId = [];
        $this->students = [];
        $this->reasons = [];
        $this->clearGroup();
        $this->selectAll = false;
    }


    /* =========================
       SEARCH GROUP
    ==========================*/

    public function updatedGroupday()
    {
        if ($this->groupday && empty($this->groupdayselected)) {

            $this->groupdays = Group::where('name', 'like', '%' . $this->groupday . '%')
                ->latest()
                ->take(10)
                ->get();
        } else {

            $this->groupdays = [];
        }
    }
    public function updatedName()
    {
        if ($this->name && empty($this->nameselected)) {

            $this->groups = Group::where('name', 'like', '%' . $this->name . '%')
                ->latest()
                ->take(10)
                ->get();
        } else {
            $this->groups = [];
        }
    }

    /* =========================
       SELECT GROUP
    ==========================*/

    public function selectGroup($groupName)
    {
        $this->nameselected = $groupName;
        $this->name = $groupName;
        $this->groups = [];

        $this->loadStudents();
    }

    /* =========================
       CLEAR GROUP
    ==========================*/

    public function clearGroup()
    {
        $this->nameselected = null;
        $this->name = null;
        $this->students = [];
    }

    /* =========================
       LOAD STUDENTS
    ==========================*/

    public function loadStudents()
    {
        $this->students = Student::where('class', $this->nameselected)->get();
    }

    /* =========================
       SELECT ALL
    ==========================*/

    public function updatedSelectAll($value)
    {
        if ($value) {

            $this->arrayId = collect($this->students)
                ->pluck('id')
                ->toArray();
        } else {

            $this->arrayId = [];
        }
    }

    public function render()
    {
        return view('livewire.student.writeing');
    }
}
