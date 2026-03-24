<?php

namespace App\Livewire\Techer;

use App\Models\Account;
use App\Models\Techer;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

use function Flasher\Prime\flash;

class AddTecher extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[Session]
    public $Techeradd = false;

    public $name;
    public $mobile;
    public $address;
    public $numberid;
    public $password;
    public $datenumberidexpiry;

    public $editId = null;
    public $isEdit = false;
    public $search = '';



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleForm()
    {
        $this->Techeradd = ! $this->Techeradd;

        if (! $this->Techeradd) {
            $this->resetForm();
        }
    }

    public function save()
    {
        $rules = [
            'name' => 'required|min:2|max:100|unique:accounts,name,' . $this->editId,
            'mobile' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'numberid' => 'nullable|string|max:100',
            'datenumberidexpiry' => 'nullable|date',
        ];

        // ✅ password only required when creating
        if (!$this->editId) {
            $rules['password'] = 'required|min:6';
        } else {
            $rules['password'] = 'nullable|min:6';
        }

        $this->validate($rules);

        $data = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'numberid' => $this->numberid,
            'role' => 'techer',
            'datenumberidexpiry' => $this->datenumberidexpiry ?: null,
        ];

        // ✅ only update password if user entered it
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        Account::updateOrCreate(
            ['id' => $this->editId],
            $data
        );

        flash()->success(
            $this->editId
                ? 'هاتە گوهرین'
                : 'هاتە زێـدەکــرن'
        );

        $this->resetForm();
        $this->Techeradd = false;
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->reset([
            'name',
            'mobile',
            'address',
            'numberid',
            'password',
            'datenumberidexpiry',
            'editId',
            'isEdit',
        ]);
    }

    public function edit($id)
    {
        $teacher = Account::findOrFail($id);

        $this->editId = $teacher->id;
        $this->name = $teacher->name;
        $this->mobile = $teacher->mobile;
        $this->address = $teacher->address;
        $this->numberid = $teacher->numberid;
        $this->datenumberidexpiry = $teacher->datenumberidexpiry;

  
        $this->password = null;

        $this->isEdit = true;
        $this->Techeradd = true;
    }
    public function render()
    {
        $techers = Account::query()
            ->where('role', 'techer')
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.techer.add-techer', compact('techers'));
    }
}
