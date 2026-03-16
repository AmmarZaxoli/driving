<?php

namespace App\Livewire\Nationality;

use App\Models\Nationality;
use Livewire\Component;
use Livewire\WithPagination;

use function Flasher\Prime\flash;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Nationalityadd = false;
    public $nationality;
    public $editId = null;
    public $isEdit = false;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleForm()
    {
        $this->Nationalityadd = ! $this->Nationalityadd;

        if (! $this->Nationalityadd) {
            $this->reset('nationality');
        }
    }




    public function save()
    {
        $this->validate([
            'nationality' => 'required|min:2|max:100|unique:nationalities,nationality,' . $this->editId,
        ]);

        $isEdit = $this->isEdit;

        Nationality::updateOrCreate(
            ['id' => $this->editId],
            [
                'nationality' => $this->nationality,
            ]
        );

        flash()->success(
            $isEdit
                ? 'هاتە گوهرین'
                : 'هاتە تومارکرن'
        );

        $this->resetForm();
        $this->Nationalityadd = false;
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->reset([
            'nationality',
            'editId',
            'isEdit',
        ]);
    }

    public function edit($id)
    {
        $nat = Nationality::findOrFail($id);

        $this->editId = $nat->id;
        $this->nationality = $nat->nationality;
        $this->isEdit = true;
        $this->Nationalityadd = true;
    }

    protected $listeners = ['deletenationality'];

    public function deleteNationality($id)
    {

        $nationality = Nationality::find($id);

        if ($nationality) {
            $nationality->delete();



            flash()->success('هاتە ژێـــبـرن');
        }
    }
    public function render()
    {
        $nationalities = Nationality::where('nationality', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.nationality.show', compact('nationalities'));
    }
}
