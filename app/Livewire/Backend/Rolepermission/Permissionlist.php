<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isEmpty;

class Permissionlist extends Component
{
    public  $permissions;
    
    public function render()
    {
        if ($this->permissions == null ||count($this->permissions)==0) {
            $this->permissions = Permission::all();
        }
        return view('livewire.backend.rolepermission.permissionlist', [
            'permissions' => $this->permissions,
        ]);
    }
    public function  fetchData($val)
    {
        $this->permissions = Permission::where("name", 'LIKE', '%' . $val . '%')->get();
        // $this->dispatch('permissionlist', $this->permissions);
    }
    #[On("permissionlist")]
    public function updatelist(){
        $this->permissions = Permission::all();
    }
}
