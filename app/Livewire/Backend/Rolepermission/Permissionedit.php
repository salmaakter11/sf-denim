<?php

namespace App\Livewire\Backend\Rolepermission;

use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class Permissionedit extends Component
{
    public $id;
    public $roles;
    public $permission;
    #[Rule('required')]
    public $name;
    public function mount(Permission $permission){
        $this->permission = $permission;
        $this->id = $permission->id;
        $permission = Permission::findOrFail($this->id);
        $this->name =  $permission->name;
    }
    #[Layout('layouts.app')]
    public function render()
    {
        $this->update_list();
        return view('livewire.backend.rolepermission.permissionedit',[
            'permission'=>  $this->permission,
            'roles'=>  $this->roles,
        ]);
    }
    #[On("permissionedit")]
    public function update_list(){
        $permission_id_to_ignore = $this->id;
        $this->roles = Role::whereNotIn('id', function ($query) use ($permission_id_to_ignore) {
            $query->select('role_id')
                ->from('role_has_permissions')
                ->where('permission_id', $permission_id_to_ignore);
        })->get();
    }

    public function update(){
        $validated = $this->validate();
        $permission = Permission::findOrFail($this->id);
        $permission->update([
            'name' => $this->name,
        ]);
        $this->id='';
        session()->flash('permissionlist', 'Permission updated Successfully.');
        return redirect()->route('permission.index');
    }
    public function assign_role($rolename){
        if ($this->permission->hasRole($rolename, 'admin')) {
            session()->flash('permissionedit3', 'Role exists.');          
        }else{
            $this->permission->assignRole($rolename);
            session()->flash('permissionedit3', 'Role assigned.');  
            // $this->dispatch('permissionedit');
        }
       
    }
    public function removeRole(Role $role)
    {
        if ($this->permission->hasRole($role)) {
            $this->permission->removeRole($role);
            session()->flash('permissionedit2', 'Role removed.');
            // $this->dispatch('permissionedit');    
        }else{
            session()->flash('permissionedit2', 'Role not exists.');  
        }
       
    }
}
