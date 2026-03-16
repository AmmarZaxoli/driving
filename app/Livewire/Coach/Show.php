<?php

namespace App\Livewire\Coach;

use App\Models\Coach;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name;
    public $mobile;
    public $address;
    public $numberid;
    public $password1;
    public $datenumberidexpiry;
    public $coachAdd = false;
    public $search = '';


    public $isEdit = false;
    public $editId = null;


    public function edit($id)
    {
        $coach = Coach::findOrFail($id);

        $this->editId = $coach->id;
        $this->isEdit = true;
        $this->coachAdd = true;

        $this->name = $coach->name;
        $this->mobile = $coach->mobile;
        $this->numberid = $coach->numberid;
        $this->datenumberidexpiry = $coach->datenumberidexpiry;
        $this->address = $coach->address;
        $this->password1 = $coach->password;
    }


    public function toggleForm()
    {
        $this->coachAdd = ! $this->coachAdd;

        if (! $this->coachAdd) {
            $this->reset([
                'name',
                'mobile',
                'numberid',
                'datenumberidexpiry',
                'address',
                'password1'
            ]);
        }
    }
    protected $rules = [
        'name' => 'required|string|max:255|unique:coaches,name',
        'mobile' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'numberid' => 'nullable|string|max:100',
        'password' => 'required|string|min:2',
        'datenumberidexpiry' => 'nullable|date',
    ];

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:coaches,name,' . $this->editId,
            'password1' => 'required|string|min:2',
        ]);

        // دروستکرنا Array بۆ داتایان
        $data = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'numberid' => $this->numberid,
            'datenumberidexpiry' => $this->datenumberidexpiry,
            'address' => $this->address,
        ];

        // ئەگەر پاسۆرد هاتە گوهۆڕین یان یێ نوو بوو، بیکە Hash
        // تێبینی: ئەگەر تو نۆکە یێ فێربوونی، هەمی جاران بیکە Hash
        $data['password'] = Hash::make($this->password1);

        Coach::updateOrCreate(
            ['id' => $this->editId],
            $data
        );

        flash()->success($this->editId ? 'هاتە گوهــریــن' : 'هاتە زێـدەکــرن');

        $this->resetForm();
        $this->coachAdd = false;
        $this->resetPage();
    }
    private function resetForm()
    {
        $this->reset([
            'name',
            'mobile',
            'numberid',
            'password1',
            'datenumberidexpiry',
            'address',
            'isEdit',
            'editId',
        ]);
    }

    protected $listeners = ['deleteCoach'];

    public function deleteCoach($id)
    {

        $coach = Coach::findOrFail($id);

        if ($coach) {
            $coach->delete();



            flash()
                ->success('هاتە ژێـــبـرن');
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $coaches = Coach::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('mobile', 'like', '%' . $this->search . '%')
            ->orWhere('numberid', 'like', '%' . $this->search . '%')
            ->paginate(30);

        return view('livewire.coach.show', compact('coaches'));
    }
}
