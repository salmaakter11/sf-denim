<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Rolecreate extends Component
{
    #[Rule('required')]
    public $name;
    public function render()
    {
        return view('livewire.backend.rolepermission.rolecreate');
    }
    public function save(){
        $validated = $this->validate();
        $validated['guard_name'] = 'admin';
        $role = Role::create($validated);
        $this->reset("name");
        session()->flash('rolecreate','New Role Added');
        $roles =   Role::paginate(10);
        $this->dispatch('rolelist', $roles);
    }
}
