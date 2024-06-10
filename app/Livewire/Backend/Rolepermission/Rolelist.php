<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Rolelist extends Component
{
    #[On("rolelist")]
    public function render()
    {
        return view('livewire.backend.rolepermission.rolelist',[
            'roles'=>  Role::paginate(10),
        ]);
    }
    public function delete(Role $role)
    {
        $role->delete();
        $roles =  Role::paginate(10);
        session()->flash('rolelist','Role deleted successfully');
        $this->dispatch('rolelist', $roles);
    }
}
