<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentInfo;
use App\Models\Student;
use App\Models\Coach;
use Illuminate\Support\Facades\DB;

class Absent extends Component
{
    use WithPagination;

    public $coach_id;
    public $student_name;
    public $date_from;
    public $date_to;
    public $day_learn;
    public $coaches;
    public $absent_id;
    public $loading = false;

    protected $updatesQueryString = ['coach_id', 'student_name', 'date_from', 'date_to'];
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->coaches = Coach::orderBy('name')->get();
    }

    public function updatedCoachId()
    {
        $this->resetPage();
    }

    public function updatedStudentName()
    {
        $this->resetPage();
    }

    public function updatedDateFrom()
    {
        $this->resetPage();
    }


    public function updatedDateTo()
    {
        $this->resetPage();
    }




    public function setAbsentId($id)
    {
        $this->absent_id = $id;
    }
    public function deleteabsent()
    {
        $this->validate([
            'day_learn' => 'required|date',
        ]);

        DB::transaction(function () {

            $absent = StudentInfo::findOrFail($this->absent_id);

            if (!$absent) return;

            $student = Student::findOrFail($absent->student_id);

            $absent->delete();

            if ($student) {
                $student->update([
                    'date_learn' => $this->day_learn,
                ]);
            }
        });

        $this->dispatch('closeModal');
        flash()->success('هاتە ژێـــبـرن');
    }

    public function render()
    {
        $query = StudentInfo::with('student', 'coach');

        // Filter by coach
        if ($this->coach_id) {
            $query->where('coach_id', $this->coach_id);
        }

        // Filter by student name
        if ($this->student_name) {
            $query->whereHas('student', function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', '%' . $this->student_name . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->student_name . '%');
                });
            });
        }

        // Filter by date
        if ($this->date_from && $this->date_to) {
            $query->whereBetween('date_day', [$this->date_from, $this->date_to]);
        } elseif ($this->date_from) {
            $query->whereDate('date_day', '>=', $this->date_from);
        } elseif ($this->date_to) {
            $query->whereDate('date_day', '<=', $this->date_to);
        } else {
            // Default: only show today
            $query->whereDate('date_day', now());
        }

        $absents = $query->orderBy('date_day', 'desc')->paginate(20);

        return view('livewire.student.absent', [
            'absents' => $absents,
        ]);
    }
}
