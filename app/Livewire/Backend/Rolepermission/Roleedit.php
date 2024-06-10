<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roleedit extends Component
{
    public $id;
    public $role;
    public $permissions;
    #[Rule('required')]
    public $name;

    public function mount(Role $role){
        $this->role = $role;
        $this->id = $role->id;
        $role = Role::findOrFail($this->id);
        $this->name =  $role->name;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $this->update_list();
        return view('livewire.backend.rolepermission.roleedit',[
            'role'=>$this->role,
            'permissions'=> $this->permissions,
        ]);
    }

    #[On("roleedit")]
    public function update_list(){
        $role_id_to_ignore = $this->id;
        $this->permissions = Permission::whereNotIn('id', function ($query) use ($role_id_to_ignore) {
            $query->select('permission_id')
                ->from('role_has_permissions')
                ->where('role_id', $role_id_to_ignore);
        })->get();
    }


    public function update(){
        $validated = $this->validate();
        $role = Role::findOrFail($this->id);
        $role->update([
            'name' => $this->name,
        ]);
        $this->id='';
        session()->flash('rolelist', 'Role updated Successfully.');
        return redirect()->route('roles.index');
    }
    public function givePermission($permission)
    {
        if($this->role->hasPermissionTo($permission)){
            session()->flash('roleedit3', 'Permission exists.');  
        }else{
            $this->role->givePermissionTo($permission);
            session()->flash('roleedit3', 'Permission added.');  
            // $this->dispatch('roleedit');
        }
       
       
    }
 
    public function revokePermission(Permission $permission)
    {
        if($this->role->hasPermissionTo($permission)){
            $this->role->revokePermissionTo($permission);
            session()->flash('roleedit2', 'Permission revoked.');  
            
        }else{
            session()->flash('roleedit2', 'Permission not exists.');  
        }
    }
}
