<?php

namespace App\Livewire\Cart;

use App\Models\Student;
use Livewire\Component;

class Show extends Component
{
    public $search = '';
    public $selectedStudents = [];

    // Add this property
    public $selectAll = false;

    // Add this method
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectFirstEight();
        } else {
            $this->clearSelections();
        }
    }

    // Rules for selection
    protected $rules = [
        'selectedStudents' => 'array|max:8',
    ];

    // Listen for checkbox changes
    public function updatedSelectedStudents($value)
    {
        // Ensure we don't exceed 8 selections
        if (count($this->selectedStudents) > 8) {
            // Remove the oldest selection
            array_shift($this->selectedStudents);

            // Or you can show an error message
            flash()->error('error', 'تەنیا ٨ قوتابی دەتوانیت هەڵبژێریت');
        }
    }

    // Select the first 8 students
    public function selectFirstEight()
    {
        $firstEightIds = Student::with('coach')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%')
                    ->orWhere('location', 'like', '%' . $this->search . '%')
                    ->orWhereHas('coach', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->limit(8)
            ->pluck('id')
            ->toArray();

        $this->selectedStudents = $firstEightIds;
    }

    // Clear all selections
    public function clearSelections()
    {
        $this->selectedStudents = [];
        $this->selectAll = false;
    }

    // Print selected students
    public function printSelected()
    {
        if (empty($this->selectedStudents)) {
            flash()->error('error', 'هیچ قوتابیەک هەڵنەبژێردراوە');
            return;
        }

        $this->dispatch('printIframe', ids: implode(',', $this->selectedStudents));

        $this->clearSelections();
    }




    public function render()
    {
        $Students = Student::with('coach')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%')
                    ->orWhere('location', 'like', '%' . $this->search . '%')
                    ->orWhereHas('coach', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate(30);

        return view('livewire.cart.show', [
            'Students' => $Students,
        ]);
    }
}
