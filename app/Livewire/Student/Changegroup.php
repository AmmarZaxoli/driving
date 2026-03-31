<?php

namespace App\Livewire\Student;

use App\Models\Group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Changegroup extends Component
{
    use WithPagination;

    // ── schedule form ─────────────────────────────────
    public $makedateforgrop      = false;
    public $nameChange1;
    public $groupsChange1        = [];
    public $nameselectedTochange1;
    public $dayoflearning;
    public $time1;
    public $time2;

    // ── inline edit ───────────────────────────────────
    public $editingGroupId    = null;
    public $editDayoflearning;
    public $editTime1;
    public $editTime2;

    // ── students modal ────────────────────────────────
    public $showStudentsModal = false;
    public $modalGroupName    = '';
    public $modalSearch       = '';

    // =====================================================
    // SCHEDULE FORM
    // =====================================================
    public function toggleForm1()
    {
        $this->makedateforgrop = !$this->makedateforgrop;

        if (!$this->makedateforgrop) {
            $this->resetForm1();
        }
    }

    public function resetForm1()
    {
        $this->reset([
            'nameChange1',
            'nameselectedTochange1',
            'groupsChange1',
            'dayoflearning',
            'time1',
            'time2',
        ]);
        $this->resetValidation();
    }

    public function updatedNameChange1()
    {
        if ($this->nameChange1 && empty($this->nameselectedTochange1)) {
            $this->groupsChange1 = Group::where('status', 0)
                ->where('name', 'like', '%' . $this->nameChange1 . '%')
                ->latest()
                ->take(10)
                ->get();
        } else {
            $this->groupsChange1 = [];
        }
    }

    public function selectGroupchange1($groupName)
    {
        $this->nameselectedTochange1 = $groupName;
        $this->nameChange1           = $groupName;
        $this->groupsChange1         = [];

        $group               = Group::where('name', $groupName)->first();
        $this->dayoflearning = $group?->dayoflearning ?? null;
        $this->time1         = $group?->time1 ?? null;
        $this->time2         = $group?->time2 ?? null;
    }

    public function clearGroupchange1()
    {
        $this->nameChange1           = '';
        $this->nameselectedTochange1 = '';
        $this->groupsChange1         = [];
        $this->dayoflearning         = null;
        $this->time1                 = null;
        $this->time2                 = null;
        $this->resetValidation();
    }


    public function saveSelectedchange1()
    {
        $this->validate([
            'nameselectedTochange1' => 'required',
            'dayoflearning'         => 'required|date',
            'time1'                 => 'required',
            'time2'                 => 'required|after:time1',
        ], [
            'nameselectedTochange1.required' => 'دڤێت گروپێ هەلبژێری',
            'dayoflearning.required'         => 'دڤێت ژڤانی دیار بکەی',
            'dayoflearning.date'             => 'ژڤانی دروست نییە',
            'time1.required'                 => 'دڤێت دەمێ دەستپێکرن دیار بکەی',
            'time2.required'                 => 'دڤێت دەمێ دووماهیێ دیاری بکەی',
            'time2.after'                    => ' دڤێت دەمێ دەستپێکرنێ پتربیت ژ  دەمێ دووماهیێ ',
        ]);

        $conflict = $this->checkConflict(
            $this->dayoflearning,
            $this->time1,
            $this->time2,
            $this->nameselectedTochange1,
            'name'
        );

        if ($conflict) {
            flash()->warning(
                'کاتی ' .
                    Carbon::parse($this->time1)->format('h:i A') .
                    ' - ' .
                    Carbon::parse($this->time2)->format('h:i A') .
                    ' ئەڤ ڕێکەوتێ گروپا ' . $conflict->name . ' هەیە'
            );
            return;
        }

        // Update group schedule
        Group::where('name', $this->nameselectedTochange1)
            ->update([
                'dayoflearning' => $this->dayoflearning,
                'time1'         => $this->time1,
                'time2'         => $this->time2,
                'reservation'   => 1,
            ]);

        // Update students that belong to this class
        Student::where('class', $this->nameselectedTochange1)
            ->update([
                'dateread' => $this->dayoflearning,
                'time'     => $this->time1,
            ]);

        $this->resetForm1();
        $this->makedateforgrop = false;

        flash()->success('ڕێکەوت و کات هاتە تۆمارکرن');
    }



    // Load group into top form from table row
    public function loadGroupToForm($groupName)
    {
        $this->makedateforgrop       = true;
        $group                       = Group::where('name', $groupName)->first();
        $this->nameselectedTochange1 = $groupName;
        $this->nameChange1           = $groupName;
        $this->dayoflearning         = $group?->dayoflearning;
        $this->time1                 = $group?->time1;
        $this->time2                 = $group?->time2;

        // scroll to top smoothly
        $this->dispatch('scroll-top');
    }

    // =====================================================
    // INLINE EDIT
    // =====================================================
    public function startEdit($id, $day, $time1, $time2)
    {
        $this->editingGroupId    = $id;
        $this->editDayoflearning = $day;
        $this->editTime1         = $time1;
        $this->editTime2         = $time2;
        $this->resetValidation();
    }

    public function cancelEdit()
    {
        $this->editingGroupId    = null;
        $this->editDayoflearning = null;
        $this->editTime1         = null;
        $this->editTime2         = null;
        $this->resetValidation();
    }

    public function saveInlineEdit($id)
    {
        $this->validate([
            'editDayoflearning' => 'required|date',
            'editTime1'         => 'required',
            'editTime2'         => 'required|after:editTime1',
        ], [
            'editDayoflearning.required' => 'دڤێت ڕێکەوت دیاری بکەی',
            'editDayoflearning.date'     => 'ڕێکەوت دروست نییە',
            'editTime1.required'         => 'دڤێت کاتی دەستپێکردنێ دیاری بکەی',
            'editTime2.required'         => 'دڤێت کاتی کۆتایێ دیاری بکەی',
            'editTime2.after'            => 'کاتی کۆتایێ دڤێت دوای کاتی دەستپێکردنێ بێت',
        ]);

        $conflict = $this->checkConflict(
            $this->editDayoflearning,
            $this->editTime1,
            $this->editTime2,
            $id,
            'id'
        );

        if ($conflict) {
            flash()->warning(
                'کاتی ' . $this->editTime1 . ' - ' . $this->editTime2 .
                    ' ئەڤ ڕێکەوتێ گروپا ' . $conflict->name . ' هەیە'
            );
            return;
        }

        // Update group schedule
        $group = Group::findOrFail($id);
        $group->update([
            'dayoflearning' => $this->editDayoflearning,
            'time1'         => $this->editTime1,
            'time2'         => $this->editTime2,
            'reservation'   => 1,
        ]);

        // Update students in the same class as the group
        Student::where('class', $group->name)
            ->update([
                'dateread' => $this->editDayoflearning,
                'time'     => $this->editTime1 ,
            ]);

        $this->cancelEdit();
        flash()->success('هاتە گۆڕین');
    }

    // =====================================================
    // STUDENTS MODAL
    // =====================================================
    public function openStudentsModal($groupName)
    {
        $this->modalGroupName = $groupName;
        $this->modalSearch    = '';
        $this->showStudentsModal = true;
    }

    public function closeStudentsModal()
    {
        $this->showStudentsModal = false;
        $this->modalGroupName    = '';
        $this->modalSearch       = '';
        $this->resetPage('modalPage');
    }

    public function updatedModalSearch()
    {
        $this->resetPage('modalPage');
    }

    // =====================================================
    // SHARED CONFLICT CHECK
    // =====================================================
    private function checkConflict(
        string $day,
        string $time1,
        string $time2,
        mixed  $excludeValue,
        string $excludeField = 'id'
    ): ?Group {
        return Group::where('dayoflearning', $day)
            ->where($excludeField, '!=', $excludeValue)
            ->where(function ($query) use ($time1, $time2) {
                $query->where(function ($q) use ($time1) {
                    $q->where('time1', '<=', $time1)
                        ->where('time2', '>', $time1);
                })
                    ->orWhere(function ($q) use ($time2) {
                        $q->where('time1', '<', $time2)
                            ->where('time2', '>=', $time2);
                    })
                    ->orWhere(function ($q) use ($time1, $time2) {
                        $q->where('time1', '>=', $time1)
                            ->where('time2', '<=', $time2);
                    });
            })
            ->first();
    }

    // =====================================================
    // RENDER
    // =====================================================
    public function render()
    {
        $scheduledGroups = Group::where('status', 0)
            ->orderBy('dayoflearning')
            ->orderBy('time1')
            ->get();

        // Students for the modal — only loaded when modal is open
        $modalStudents = collect();
        if ($this->showStudentsModal && $this->modalGroupName) {
            $modalStudents = Student::where('status', 0)
                ->where('learn', 1)
                ->where('class', $this->modalGroupName)
                ->when($this->modalSearch, function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('name', 'like', '%' . $this->modalSearch . '%')
                            ->orWhere('mobile_number', 'like', '%' . $this->modalSearch . '%');
                    });
                })
                ->orderBy('name')
                ->paginate(10, ['*'], 'modalPage');
        }

        return view('livewire.student.changegroup', [
            'scheduledGroups' => $scheduledGroups,
            'modalStudents'   => $modalStudents,
        ]);
    }
}
