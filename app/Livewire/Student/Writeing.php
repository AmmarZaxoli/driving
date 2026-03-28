<?php

namespace App\Livewire\Student;

use App\Models\Group;
use App\Models\Student;
use Livewire\Component;

class Writeing extends Component
{
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

    public function selectGroupDay($name)
    {
        $this->groupday = $name;
        $this->groupdayselected = $name;
        $this->groupdays = [];
    }

    public function toggleForm()
    {
        $this->adddayofgroup = ! $this->adddayofgroup;

        if (!$this->adddayofgroup) {
            // $this->resetForm();
        }
    }



    public function saveGroupDay()
    {
       
        if(empty($this->groupdayselected)) {
            flash()->error('Please select a group');
            return;
        }
        if(empty($this->dayoflearning)) {
            flash()->error('Please select a day of learning');
            return;
        }

       
        $group = Group::where('name', $this->groupdayselected)->first();

        if ($group) {
            $group->update([
                'dayoflearning' => $this->dayoflearning
            ]);
        }

        flash()->success('Saved successfully');
    }

    public function clearGroupDay()
    {
        $this->groupday = '';
        $this->groupdayselected = '';
        $this->groupdays = [];
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
