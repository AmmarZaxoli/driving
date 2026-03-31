<?php

namespace App\Livewire\Student;

use App\Models\Group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class AddToClass extends Component
{
    use WithPagination;

    public $search = '';
    public $search1 = '';
    public $name1;
    public $name;
    public $nameselected;

    public $groups = [];
    public $Groupadd = false;
    public $table1 = false;
    public $table2 = false;
    public $arrayId = [];

    public $nameChange;

    public $groupsChange = [];

    public $nameselectedTochange;

    public $makedateforgrop = false;

    protected $rules = [
        'nameselected' => 'required',
    ];

    public $selectAll = false;


    public function updatedSelectAll($value)
    {
        if ($value) {

            $this->arrayId = Student::query()
                ->where('status', 0)
                ->where('learn', 1)
                ->where(function ($query) {
                    $query->whereNull('class')->orWhere('class', '');
                })
                ->when($this->search, function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                })
                ->orderBy('name')
                ->paginate(10)
                ->pluck('id')
                ->toArray();
        } else {
            $this->arrayId = [];
        }
    }

    public function updatedNameChange()
    {
        if ($this->nameChange && empty($this->nameselectedTochange)) {

            $this->groupsChange = Group::where('status', 0)
                ->where('name', 'like', '%' . $this->nameChange . '%')
                ->latest()
                ->take(10)
                ->get();
        } else {
            $this->groupsChange = [];
        }
    }



    public function selectGroupchange($groupName)
    {
        $this->nameselectedTochange = $groupName;
        $this->nameChange = $groupName;
        $this->groupsChange = [];
    }


    public function clearGroupchange()
    {
        $this->nameChange = '';
        $this->nameselectedTochange = '';
        $this->groupsChange = [];
    }


    public function toggleForm()
    {
        $this->Groupadd = !$this->Groupadd;

        if (!$this->Groupadd) {
            $this->resetForm();
        }
    }



    public function resetForm1()
    {
        $this->reset([
            'name1',
            'nameselected',
            'groups',
            'Groupadd',
            'nameChange1',
            'nameselectedTochange1',
            'groupsChange1',
            'dayoflearning',
            'time1',
            'time2',
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name1', 'nameselected', 'groups', 'Groupadd']);
    }

    public function save()
    {
        $this->validate([
            'name1' => 'required|unique:groups,name'
        ]);

        Group::create([
            'name' => $this->name1
        ]);

        $this->reset(['name1']);
        flash()->success('هاتە زێـدەکــرن');
    }

    public function saveSelected()
    {
        if (empty($this->arrayId)) {
            flash()->warning('دڤێت فیرخاز بهێنە هەلبژارتن');
            return;
        }

        if (empty($this->nameselected)) {
            flash()->warning('دڤێت گروپی  بوو فیرخازا هەلبژێری');
            return;
        }

        // Get group schedule
        $group = Group::where('name', $this->nameselected)->first();

        if (!$group) {
            flash()->warning('گروپ نەدۆزرایەوە یاخود ڕێکەوت و کات نەدارد');
            return;
        }

        // Update selected students
        Student::whereIn('id', $this->arrayId)
            ->update([
                'class'    => $this->nameselected,
                'dateread' => $group->dayoflearning,
                'time'     => $group->time1,
            ]);

        $this->reset(['name', 'nameselected']);
        $this->arrayId = [];

        flash()->success('Selected students have been added to the class with date and time!');
    }

    public $studentIdToChange;

    public function setStudentToChange($id)
    {
        $this->studentIdToChange = $id;
    }


    public function saveSelectedchange()
    {
        if (empty($this->nameselectedTochange)) {
            flash()->warning('دڤێت گروپی بوو فیرخازی هەلبژێری');
            return;
        }

        Student::where('id', $this->studentIdToChange)
            ->update(['class' => $this->nameselectedTochange]);

        $this->reset(['nameselectedTochange', 'studentIdToChange']);

        $this->dispatch('closeModal');

        flash()->success('Group changed successfully!');
    }
    public function clearGroup()
    {
        $this->name         = '';
        $this->nameselected = '';
        $this->groups       = [];
    }


    public function selectGroup($groupName)
    {
        $this->nameselected = $groupName;
        $this->name         = $groupName;
        $this->groups       = [];
    }


    public function updatedName()
    {
        if ($this->name && !$this->nameselected) {

            $this->groups = Group::query()
                ->where('status', 0)
                ->where('name', 'like', "%{$this->name}%")
                ->latest()
                ->limit(10)
                ->get();
        } else {
            $this->groups = [];
        }
    }


    public function render()
    {

        $students = Student::query()
            ->where('status', 0)
            ->where('learn', 1)
            ->where(function ($query) {
                $query->whereNull('class')->orWhere('class', '=', '');
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(10, ['*'], 'studentsPage');

        $studentsCa = Student::query()
            ->whereNotNull('class')
            ->where('class', '!=', '')
            ->where('status', 0)
            ->where('learn', 1)
            ->when($this->search1, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search1 . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search1 . '%')
                        ->orWhere('class', 'like', '%' . $this->search1 . '%');
                });
            })
            ->orderBy('name')
            ->paginate(10, ['*'], 'classedPage');

        return view('livewire.student.add-to-class', [
            'students' => $students,
            'studentsCa' => $studentsCa,
        ]);
    }
}
