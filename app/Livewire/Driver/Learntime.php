<?php

namespace App\Livewire\Driver;

use App\Models\Attendance;
use App\Models\Learntype;
use App\Models\Student;
use App\Models\StudentInfo;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class Learntime extends Component
{
    use WithPagination;

    public $id;
    public $coach;
    public $search = '';
    public $learn = [];      
    public $learnTypes = [];
    public $arrayId = [];

    public function saveSelected()
    {
        if (empty($this->arrayId)) {
            flash()->warning('Please select student(s)!');
            return;
        }

        $today = Carbon::today()->toDateString();

        // Get students that are already marked absent today
        $alreadyAbsentIds = StudentInfo::whereIn('student_id', $this->arrayId)
            ->where('date_day', $today)
            ->pluck('student_id')
            ->toArray();

        // Filter out students who are already absent
        $toMarkAbsent = array_diff($this->arrayId, $alreadyAbsentIds);

        if (empty($toMarkAbsent)) {
            flash()->warning('All selected students are already marked absent today!');
            return;
        }

        // Mark the remaining students as absent
        foreach ($toMarkAbsent as $id) {
            StudentInfo::create([
                'student_id' => $id,
                'absent' => true,
                'date_day' => $today,
                'coach_id' => Auth::id(),
            ]);

            // Increment date_learn in students table
            Student::where('id', $id)->increment('date_learn', 1);
        }

        flash()->success('Selected students marked absent and updated successfully!');
    }

    public function mount()
    {
        $this->learnTypes = Learntype::all();
    }


    public function save($studentId)
    {
        $today = Carbon::today()->toDateString();

        // Check if student is already absent today
        $alreadyAbsent = StudentInfo::where('student_id', $studentId)
            ->where('date_day', $today)
            ->exists();

        if ($alreadyAbsent) {
            flash()->warning('Student is already marked absent today!');
            return false;
        }

        // Get the selected learn type
        $learnTypeId = $this->learn[$studentId] ?? null;

        if (!$learnTypeId) {
            flash()->warning('Please select a learn type!');
            return;
        }

        // Create attendance
        Attendance::create([
            'student_id' => $studentId,
            'learn_type' => $learnTypeId,
            'date_learn' => now(),
            'coach_id'   => Auth::id(),
        ]);

        // Update student's next learning date (-1 day) and increment dayoflearn
        $student = Student::findOrFail($studentId);
        $student->date_learn = Carbon::parse($student->date_learn ?? now())->addDay();
        $student->dayoflearn = ($student->dayoflearn ?? 0) - 1;
        if($student->dayoflearn == 0){
            $student->status = 1; 
        }
        $student->save();

        flash()->success('Attendance saved, next learning date updated, and day of learn incremented!');
    }




    public function render()
    {

        $students = Student::with('todayAbsent')
            ->where('learn', 0)
            ->where('status', 0)
            ->whereDate('date_learn', '=', Carbon::today())
            ->where('coach_id', Auth::id())
            ->where('dayoflearn', '>', 0)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(30);

        return view('livewire.driver.learntime', [
            'students' => $students
        ]);
    }
}
