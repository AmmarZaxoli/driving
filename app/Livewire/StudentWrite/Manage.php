<?php

namespace App\Livewire\StudentWrite;

use App\Models\Coach;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public $search;
    public $coachs;
    public $coach_id;

    public function mount()
    {
        $this->coachs = Coach::all();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCoachId()
    {
        $this->resetPage();
    }
    public function render()
    {
        $students = Student::query()
            ->where('learn', 0)
            ->where('status', 0)
            ->when($this->coach_id, function ($query) {
                $query->where('coach_id', $this->coach_id);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when(!$this->coach_id, function ($query) {
                $query->whereRaw('1 = 0'); 
            })
            ->orderBy('name')
            ->paginate(30);

        return view('livewire.student-write.manage', [
            'Students' => $students,
        ]);
    }
}
