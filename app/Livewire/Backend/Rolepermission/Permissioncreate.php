<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissioncreate extends Component
{
    #[Rule('required')]
    public $name;
    public function render()
    {
        return view('livewire.backend.rolepermission.permissioncreate');
    }
    public function save(){
        $validated = $this->validate();
        $validated['guard_name'] = 'admin';
        $permission = Permission::create($validated);
        $this->reset("name");
        session()->flash('permissioncreate','New Permission Added');
        $permission->assignRole('admin');
        $permissions =   Permission::all();
        $this->dispatch('permissionlist', $permissions);
    }
}
