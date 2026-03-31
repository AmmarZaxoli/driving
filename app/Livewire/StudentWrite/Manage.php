<?php

namespace App\Livewire\StudentWrite;

use App\Models\Attendance;
use App\Models\Coach;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Manage extends Component
{
    use WithPagination;

    public $search = '';
    public $coachs;
    public $student_id;
    public $coach_id = null;
    public $date_learn;
    public $date_from = null;
    public $date_to = null;

    public $isFiltered = false; // Only applies date filter

    public function mount()
    {
        $this->coachs = Coach::all();
    }

    // Click "Filter" button (only works if both dates are selected)
    public function filter()
    {
        if ($this->date_from && $this->date_to) {
            $this->resetPage();
            $this->isFiltered = true;
        }
    }

    // Live search resets pagination
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Live coach filter resets pagination
    public function updatedCoachId()
    {
        $this->resetPage();
    }


    public function setAbsentId($id)
    {
        $this->student_id = $id;
    }
    public function deleteabsent()
    {

        $this->validate([
            'date_learn' => 'required|date',
        ]);



        DB::transaction(function () {

            $attendance = Attendance::findOrFail($this->student_id);

            $student = Student::findOrFail($attendance->student_id);



            // Delete attendance
            $attendance->delete();

            // Update student
            if ($student) {
                $student->increment('dayoflearn', 1, [
                    'datelearn' => $this->date_learn,
                ]);
            }
        });

        $this->dispatch('closeModal');

        flash()->success('هاتە ژێـــبـرن');
    }


    public function render()
    {
        $attendances = Attendance::with('student', 'coach')

            // ✅ Filter by coach
            ->when($this->coach_id, function ($q) {
                $q->where('coach_id', $this->coach_id);
            })

            // ✅ Date logic (مەرجێ ڕێکەوتێ تەنها دەما سێرچ نەبیت)
            ->when(!$this->search, function ($q) {
                if ($this->date_from && $this->date_to) {
                    $q->whereBetween('date_learn', [$this->date_from, $this->date_to]);
                } else {
                    $q->whereDate('date_learn', \Carbon\Carbon::today());
                }
            })

            // ✅ Search (name + mobile)
            ->when($this->search, function ($q) {
                $q->whereHas('student', function ($s) {
                    $s->where(function ($sub) {
                        $sub->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                    });
                });
            })

            ->latest()
            ->paginate(30);

        return view('livewire.student-write.manage', [
            'attendances' => $attendances,
        ]);
    }
}
