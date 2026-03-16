<?php

namespace App\Livewire\Learntype;

use App\Models\Learntype;
use Livewire\Component;
use Livewire\WithPagination;
class Manage extends Component
{
     use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Learntypeadd = false;
    public $name;
    public $editId = null;
    public $isEdit = false;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleForm()
    {
        $this->Learntypeadd = ! $this->Learntypeadd;

        if (! $this->Learntypeadd) {
            $this->reset('Learntypeadd');
        }
    }




    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:100|unique:learntypes,name,' . $this->editId,
        ]);

        $isEdit = $this->isEdit;

        Learntype::updateOrCreate(
            ['id' => $this->editId],
            [
                'name' => $this->name,
            ]
        );

        flash()->success(
            $isEdit
                ? 'هاتە گوهرین'
                : 'هاتە تومارکرن'
        );

        $this->resetForm();
        $this->Learntypeadd = false;
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->reset([
            'name',
            'editId',
            'isEdit',
        ]);
    }

    public function edit($id)
    {
        $nat = Learntype::findOrFail($id);

        $this->editId = $nat->id;
        $this->name = $nat->name;
        $this->isEdit = true;
        $this->Learntypeadd = true;
    }

    protected $listeners = ['deleteLearntype'];

    public function deleteLearntype($id)
    {

        $learntype = Learntype::findOrFail($id);

        if ($learntype) {
            $learntype->delete();



            flash()->success('هاتە ژێـــبـرن');
        }
    }
    public function render()
    {
         $learntypes = Learntype::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.learntype.manage', compact('learntypes'));
    }
}
