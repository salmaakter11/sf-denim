<?php

namespace App\Livewire\Backend\Rolepermission;

use App\Models\Admin;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class Backuseredit extends Component
{
    use WithFileUploads;
    public $id;
    public $user;
    public $permissions;
    public $oldImage;
    #[Rule('required')]
    public $name;
    #[Rule('required|email|max:250')]
    public $email;
    #[Rule('required|min:6|max:11')]
    public $phone;
    #[Rule('nullable')]
    public $current_team_id;
    #[Rule('required')]
    public $password;
    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $profile_photo_path;
    #[Rule('nullable')]
    public $status;

    public function mount($id)
    {
        $this->id = $id;
        $backuser = Admin::findOrFail($id);
        $this->user =  $backuser;
        $this->name = $backuser->name;
        $this->email = $backuser->email;
        $this->phone = $backuser->phone;
        //$this->current_team_id = $backuser->current_team_id;
       $this->password = $backuser->password;
        $this->oldImage = $backuser->profile_photo_path;
        $this->status = $backuser->status;
        $this->js('MultiselectDropdown(window.MultiselectDropdownOptions);');
    }
    #[On("backuseredit")]
    public function update_list(){
        $user_id_to_ignore = $this->id;
        $this->permissions = Permission::whereNotIn('id', function ($query) use ($user_id_to_ignore) {
            $query->select('permission_id')
                ->from('model_has_permissions')
                ->where('model_id', $user_id_to_ignore);
        })->get();
        
    }
    #[Layout('layouts.app')]
    public function render()
    {
        $this->update_list();
        return view('livewire.backend.rolepermission.backuseredit', [
            'roles' => Role::all(),
            '$permissions'=> $this->permissions,
            'user' =>  $this->user,
        ]);
    }
    public function update()
    {
       
        $validated = $this->validate();
        
        $backuser = Admin::findOrFail($this->id);
        if (Hash::check($backuser->password, $this->password)) {
            $validated['password'] = $backuser->password;
        }else{
            $validated['password'] = Hash::make($this->password);
        }
        if ($this->profile_photo_path) {
            $path = 'storage/' . $this->oldImage;
            unlink(public_path($path));
            // Storage::delete($this->oldImage);
            $photo = $this->profile_photo_path->store('admin_images', 'public');
        } else {
            $photo = $this->oldImage;
        }
        if (isset($validated['current_team_id']) && is_array($validated['current_team_id']) && count($validated['current_team_id']) != 0) {
            $backuser->syncRoles($validated['current_team_id']);
        }
        $backuser->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $validated['password'],
            'profile_photo_path' => $photo,
            'status' => $this->status,
        ]);
        $this->id = '';
        $this->oldImage = $photo;
        session()->flash('backenduserlist', 'User updated Successfully.');
        return redirect()->route('adminuser.index');
    }
    public function givePermission($permission)
    {
        if($this->user->hasPermissionTo($permission)){
            session()->flash('backuseredit3', 'Permission exists.');  
        }else{
            $this->user->givePermissionTo($permission);
            session()->flash('backuseredit3', 'Permission added.');  
            // $this->dispatch('roleedit');
        }
       
       
    }
 
    public function revokePermission(Permission $permission)
    {
        if($this->user->hasPermissionTo($permission)){
            $this->user->revokePermissionTo($permission);
            session()->flash('backuseredit2', 'Permission revoked.');            
        }else{
            session()->flash('backuseredit2', 'Permission not exists.');  
        }
    }
}
