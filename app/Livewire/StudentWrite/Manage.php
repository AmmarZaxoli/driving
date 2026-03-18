<?php

namespace App\Livewire\StudentWrite;

use App\Models\Coach;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public $search = '';
    public $coachs;
    public $coach_id = null;

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

    public function render()
    {
        $query = Student::query()
            ->where('learn', 0)
            ->where('status', 0);

        // ✅ Live search (always active)
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
            });
        }

        // ✅ Live coach filter (always active if selected)
        if ($this->coach_id) {
            $query->where('coach_id', $this->coach_id);
        }

        // ✅ Date filter only applied when both dates selected and Filter clicked
        if ($this->isFiltered && $this->date_from && $this->date_to) {
            $query->whereHas('attendances', function ($q) {
                $q->whereDate('date_learn', '>=', $this->date_from)
                    ->whereDate('date_learn', '<=', $this->date_to);
            });
        }

        $students = $query->orderBy('name')->paginate(30);

        return view('livewire.student-write.manage', [
            'Students' => $students,
        ]);
    }
}
