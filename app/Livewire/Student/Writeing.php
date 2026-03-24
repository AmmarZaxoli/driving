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
    public $selectAll = false;

    /* =========================
       SEARCH GROUP
    ==========================*/

    public function updatedName()
    {
        if ($this->name && empty($this->nameselected)) {

            $this->groups = Group::where('name','like','%'.$this->name.'%')
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
        $this->students = Student::where('class',$this->nameselected)->get();
    }

    /* =========================
       SELECT ALL
    ==========================*/

    public function updatedSelectAll($value)
    {
        if($value){

            $this->arrayId = collect($this->students)
                ->pluck('id')
                ->toArray();

        }else{

            $this->arrayId = [];

        }
    }

    public function render()
    {
        return view('livewire.student.writeing');
    }
}