<?php

namespace App\Livewire\Student;

use App\Models\Coach;
use App\Models\Nationality;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Session;
use Carbon\Carbon;

use function Flasher\Prime\flash;

class Adding extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    #[Session]
    public $name;
    #[Session]
    public $mother_name;
    #[Session]
    public $birthday;
    #[Session]
    public $location;
    #[Session]
    public $mobile_number;
    #[Session]
    public $date_join;
    #[Session]
    public $date_dr_number;
    #[Session]
    public $invoice;
    #[Session]
    public $nationality;
    #[Session]
    public $typecar;

    public $coachs;
    #[Session]
    public $coach;

    public $learn;
    #[Session]
    public $number_car;
    #[Session]
    public $data_start;
    #[Session]
    public $nationalities;
    #[Session]
    public $time;
    #[Session]
    public $time2;
    #[Session]
    public $Studentadd;
    public $isEdit;
    public $editId = null;
    public $year;


    #[Session]
    public $dayoflearn;


    public function updatedTime()
    {
        $this->calculateCounter();
    }

    public function updatedTime2()
    {
        $this->calculateCounter();
    }

    public $errorMessage;

    public function calculateCounter()
    {
        $this->errorMessage = null;

        if ($this->time && $this->time2) {
            $start = Carbon::parse($this->time);
            $end   = Carbon::parse($this->time2);

            // Only consider the hour part
            $hours = $end->hour - $start->hour;

            // Handle next day
            if ($hours < 0) {
                $hours += 24;
            }

            // Check for same time (0 hour)
            if ($hours == 0) {
                $this->dayoflearn = 0;
                $this->errorMessage = 'نابت کات وەک ئێک بت';
            }
            // 1-hour session
            elseif ($hours == 1) {
                $this->dayoflearn = 12;
            }
            // 2-hour session
            elseif ($hours == 2) {
                $this->dayoflearn = 6;
            }
            // More than 2 hours
            elseif ($hours >= 3) {
                $this->dayoflearn = 0;
                $this->errorMessage = 'نابت ژ ٢ کات ژمێرا ببوریت';
            } else {
                $this->dayoflearn = 0;
            }
        }
    }

    protected $rules = [
        'name' => 'required|min:3',
        'mother_name' => 'required|min:3',
        'birthday' => 'required|date',
        'location' => 'required',
        'mobile_number' => 'required|min:7',
        'date_join' => 'required|date',
        'date_dr_number' => 'required|date',
        'invoice' => 'required',
        'nationality' => 'required|exists:nationalities,id',
        'coach' => 'required|exists:coaches,id',
        'number_car' => 'required',
        'typecar' => 'required|in:0,1',
        'learn' => 'required|in:0,1',
        'data_start' => 'required|date',
        'time' => 'required|date_format:H:i',
    ];
    public function toggleForm()
    {
        $this->Studentadd = ! $this->Studentadd;

        if (!$this->Studentadd) {
            $this->resetForm();
        }
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function submit()
    {
        $this->validate();

        // Fix for learn = 1
        if ($this->learn == 1) {
            $this->time2 = null;
            $this->dayoflearn = 0;
        }

        if ($this->isEdit && $this->editId) {

            Student::where('id', $this->editId)->update([
                'name' => $this->name,
                'mother_name' => $this->mother_name,
                'birthday' => $this->birthday,
                'location' => $this->location,
                'mobile_number' => $this->mobile_number,
                'date_join' => $this->date_join,
                'date_dr_number' => $this->date_dr_number,
                'invoice' => $this->invoice,
                'nationality_id' => $this->nationality,
                'coach_id' => $this->coach,
                'number_car' => $this->number_car,
                'typecar' => $this->typecar,
                'learn' => $this->learn,
                'data_start' => $this->data_start,
                'data_learn' => $this->data_start,
                'time' => $this->time,
                'time2' => $this->time2,
                'dayoflearn' => $this->dayoflearn,
            ]);

            flash()->success('هاتە گوهــریــن');
        } else {

            Student::create([
                'name' => $this->name,
                'mother_name' => $this->mother_name,
                'birthday' => $this->birthday,
                'location' => $this->location,
                'mobile_number' => $this->mobile_number,
                'date_join' => $this->date_join,
                'date_dr_number' => $this->date_dr_number,
                'invoice' => $this->invoice,
                'nationality_id' => $this->nationality,
                'coach_id' => $this->coach,
                'number_car' => $this->number_car,
                'typecar' => $this->typecar,
                'learn' => $this->learn,
                'status' => false,
                'data_start' => $this->data_start,
                'data_learn' => $this->data_start,
                'time' => $this->time,
                'time2' => $this->time2,
                'dayoflearn' => $this->dayoflearn,
            ]);

            flash()->success('هاتە زێـدەکــرن');
        }

        $this->resetForm();
    }
    public function updatedLearn($value)
    {
        if ($value == 1) {
            $this->time2 = null;
            $this->dayoflearn = 0;
        }
    }
    public function resetForm()
    {
        $this->reset([
            'name',
            'mother_name',
            'birthday',
            'location',
            'mobile_number',
            'date_join',
            'date_dr_number',
            'invoice',
            'nationality',
            'coach',
            'number_car',
            'typecar',
            'learn',
            'data_start',
            'isEdit',
            'editId',
            'Studentadd',
            'time',
            'time2',
            'dayoflearn',
        ]);
    }



    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $this->editId = $student->id;
        $this->isEdit = true;
        $this->Studentadd = true;



        $this->fill([
            'name' => $student->name,
            'mother_name' => $student->mother_name,
            'birthday' => $student->birthday,
            'location' => $student->location,
            'mobile_number' => $student->mobile_number,
            'date_join' => $student->date_join,
            'date_dr_number' => $student->date_dr_number,
            'invoice' => $student->invoice,
            'nationality' => $student->nationality_id,
            'coach' => $student->coach_id,
            'number_car' => $student->number_car,
            'typecar' => $student->typecar,
            'learn' => $student->learn,
            'data_start' => $student->data_start,

            'time' => $student->time ? Carbon::parse($student->time)->format('H:i') : null,
            'time2' => $student->time2 ? Carbon::parse($student->time2)->format('H:i') : null,

            'dayoflearn' => $student->dayoflearn,
        ]);
    }


    public function mount()
    {
        $this->coachs = Coach::all();
        $this->nationalities = Nationality::all();
        $this->year = now()->year;
    }

    protected $listeners = ['deleteStudent'];

    public function deleteStudent($id)
    {

        Student::destroy($id);

        flash()->success('هاتە ژێـــبـرن');
    }



    public function render()
    {
        $students = Student::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.student.adding', [
            'Students' => $students,
        ]);
    }
}
