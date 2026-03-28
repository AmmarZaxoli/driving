<?php

namespace App\Livewire\Driver;

use App\Models\Coach;
use App\Models\Reservation;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;

class Recordtime extends Component
{
    // ===== FORM PROPERTIES =====
    public $selectedDate;
    public $selectedCoach   = '';
    public $selectedStudent = '';
    public $selectedSlot    = '';
    public $duration        = 1;
    public $showForm        = false;  // Changed from showModal
    public $editId          = null;

    // ===== AUTOCOMPLETE =====
    public $studentSearch   = '';
    public $studentList     = [];
    public $studentSelected = false;

    // ===== VIEW PROPERTIES =====
    public $viewDate;
    public $viewCoach = '';

    // ===== VALIDATION =====
    protected $rules = [
        'selectedDate'    => 'required|date',
        'selectedCoach'   => 'required|exists:coaches,id',
        'selectedStudent' => 'required|exists:students,id',
        'selectedSlot'    => 'required',
        'duration'        => 'required|in:1,2',
    ];

    protected $messages = [
        'selectedDate.required'    => 'دڤێت رووژێ هەلبژێری',
        'selectedCoach.required'   => 'دڤێت راهێنەری هەلبژێری',
        'selectedStudent.required' => 'دڤێت فێرخازی هەلبژێری',
        'selectedSlot.required'    => 'دڤێت کاتی هەلبژێری',
        'duration.required'        => 'دڤێت ماوەی هەلبژێری',
    ];

    // ===== MOUNT =====
    public function mount()
    {
        $this->selectedDate = today()->format('Y-m-d');
        $this->viewDate     = today()->format('Y-m-d');
    }

    // ===== COMPUTED PROPERTIES =====
    public function getIsFridayProperty(): bool
    {
        if (!$this->selectedDate) return false;
        return Carbon::parse($this->selectedDate)->dayOfWeek === Carbon::FRIDAY;
    }

    public function getIsViewFridayProperty(): bool
    {
        if (!$this->viewDate) return false;
        return Carbon::parse($this->viewDate)->dayOfWeek === Carbon::FRIDAY;
    }

    // ===== AUTOCOMPLETE =====
    public function updatedStudentSearch($value)
    {
        $this->studentSelected = false;
        $this->selectedStudent = '';

        if (empty($value)) {
            $this->studentList = [];
            return;
        }

        $this->studentList = Student::where('status', 0)
            ->where('learn', 0)
            ->where('statuslearn', 0)
            ->where(function ($q) use ($value) {
                $q->where('name', 'like', '%' . $value . '%')
                    ->orWhere('mobile_number', 'like', '%' . $value . '%');
            })
            ->orderBy('name')
            ->take(10)
            ->get()
            ->toArray();
    }

    public function selectStudent($id, $name)
    {
        $this->selectedStudent = $id;
        $this->studentSearch   = $name;
        $this->studentList     = [];
        $this->studentSelected = true;
    }

    public function clearStudent()
    {
        $this->selectedStudent = '';
        $this->studentSearch   = '';
        $this->studentList     = [];
        $this->studentSelected = false;
    }

    // ===== SLOTS =====
    public function getSlots(): array
    {
        $slots = [];
        for ($h = 7; $h < 20; $h++) {
            $slots[] = sprintf('%02d:00', $h);
        }
        return $slots;
    }

    // ===== CHECK IF SLOT IS BLOCKED =====
    public function getBlockedSlots(array $bookedSlots, array $bookedDurations): array
    {
        $blocked = [];

        foreach ($bookedSlots as $index => $slot) {
            $slotHour = (int) $slot;
            $dur      = $bookedDurations[$index] ?? 1;
            for ($i = 0; $i < $dur; $i++) {
                $blocked[] = sprintf('%02d:00', $slotHour + $i);
            }
        }

        return array_unique($blocked);
    }

    // ===== FORM TOGGLE METHODS =====
    public function toggleForm()
    {
        if ($this->showForm) {
            // Close form
            $this->showForm = false;
            $this->resetForm();
        } else {
            // Open form
            $this->resetForm();
            $this->showForm = true;
        }
    }

    public function openFormWithSlot($slot = null)
    {
        $this->resetForm();
        $this->selectedSlot = $slot ?? '';
        $this->showForm = true;
    }

    public function resetForm()
    {
        $this->resetValidation();
        $this->reset([
            'selectedStudent',
            'selectedSlot',
            'duration',
            'editId',
            'studentSearch',
            'studentList',
            'studentSelected'
        ]);
        $this->duration = 1;
    }

    public function editReservation($id)
    {
        $this->resetValidation();
        $r = Reservation::with('student')->findOrFail($id);

        $this->editId          = $id;
        $this->selectedDate    = $r->date->format('Y-m-d');
        $this->selectedCoach   = $r->coach_id;
        $this->selectedStudent = $r->student_id;
        $this->selectedSlot    = substr($r->start_time, 0, 5);
        $this->duration        = $r->duration;
        $this->showForm        = true;

        $this->studentSearch   = $r->student->name;
        $this->studentSelected = true;
        $this->studentList     = [];
    }

    // ===== SAVE =====
    public function save()
    {
        $this->validate();

        if ($this->isFriday) {
            $this->addError('selectedDate', 'رووژا ئەینی نابیت هەلبژێرێت');
            return;
        }

        $endHour = (int) $this->selectedSlot + (int) $this->duration;
        if ($endHour > 20) {
            $this->addError('duration', 'ماوەی فێرکرنێ ژ دەمێ فێرکرنێ دەرباز بی 8:00 ئێڤارێ');
            return;
        }

        $startHour = (int) $this->selectedSlot;
        $newSlots  = [];
        for ($i = 0; $i < (int) $this->duration; $i++) {
            $newSlots[] = sprintf('%02d:00:00', $startHour + $i);
        }

        $conflictExists = Reservation::where('coach_id', $this->selectedCoach)
            ->where('date', $this->selectedDate)
            ->where('status', '!=', 2)
            ->when($this->editId, fn($q) => $q->where('id', '!=', $this->editId))
            ->get()
            ->filter(function ($res) use ($newSlots) {
                $resStart = (int) $res->start_time;
                $resDur   = $res->duration;
                $resSlots = [];
                for ($i = 0; $i < $resDur; $i++) {
                    $resSlots[] = sprintf('%02d:00:00', $resStart + $i);
                }
                return count(array_intersect($newSlots, $resSlots)) > 0;
            })
            ->isNotEmpty();

        if ($conflictExists) {
            $this->addError('selectedSlot', 'ئەڤ کاتە توومار کریە');
            return;
        }

        Reservation::updateOrCreate(
            ['id' => $this->editId ?? 0],
            [
                'student_id' => $this->selectedStudent,
                'coach_id'   => $this->selectedCoach,
                'date'       => $this->selectedDate,
                'start_time' => $this->selectedSlot . ':00',
                'end_time'   => sprintf('%02d:00:00', $endHour),
                'duration'   => $this->duration,
                'status'     => 0,
            ]
        );

        $dayOfLearn = null;

        if ($this->duration == 1) {
            $dayOfLearn = 12;
        } elseif ($this->duration == 2) {
            $dayOfLearn = 6;
        }

        Student::where('id', $this->selectedStudent)->update([
            'statuslearn' => 1,
            'dayoflearn'  => $dayOfLearn,
            'datelearn'  => $this->selectedDate
        ]);


        $this->showForm = false;
        $this->viewDate  = $this->selectedDate;
        $this->viewCoach = $this->selectedCoach;
        $this->resetForm();

        flash()->success('هاتە زێـدەکــرن');
    }

    // ===== Delete =====
    protected $listeners = ['deleteReservation'];

    public function deleteReservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        $studentId = $reservation->student_id;

        $reservation->delete();

        $hasReservations = Reservation::where('student_id', $studentId)->exists();

        if (!$hasReservations) {
            Student::where('id', $studentId)->update([
                'statuslearn' => 0,
                'dayoflearn'  => 0,
                'datelearn'  => null
            ]);
        }

        flash()->success('هاتە ژێـــبـرن');
    }

    // ===== RENDER =====
    public function render()
    {
        $coaches = Coach::orderBy('name')->get();
        $slots   = $this->getSlots();

        $reservations = collect();
        if ($this->viewCoach && $this->viewDate) {
            $reservations = Reservation::with('student', 'coach')
                ->where('coach_id', $this->viewCoach)
                ->where('date', $this->viewDate)
                ->where('status', '!=', 2)
                ->get()
                ->keyBy(fn($r) => substr($r->start_time, 0, 5));
        }

        $bookedSlots     = [];
        $bookedDurations = [];
        $blockedSlots    = [];

        if ($this->selectedCoach && $this->selectedDate) {
            $existing = Reservation::where('coach_id', $this->selectedCoach)
                ->where('date', $this->selectedDate)
                ->where('status', '!=', 2)
                ->when($this->editId, fn($q) => $q->where('id', '!=', $this->editId))
                ->get(['start_time', 'duration']);

            foreach ($existing as $res) {
                $bookedSlots[]     = substr($res->start_time, 0, 5);
                $bookedDurations[] = $res->duration;
            }

            $blockedSlots = $this->getBlockedSlots($bookedSlots, $bookedDurations);
        }

        return view('livewire.driver.recordtime', compact(
            'coaches',
            'slots',
            'reservations',
            'bookedSlots',
            'bookedDurations',
            'blockedSlots'
        ));
    }
}
