<?php

namespace App\Livewire\Backend\Rolepermission;

use App\Models\Admin;
use Livewire\Component;

use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class Backusercreate extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $name;
    #[Rule('required|email|max:250')]
    public $email;
    #[Rule('required|min:6|max:11')]
    public $phone;
    #[Rule('required')]
    public $current_team_id;
    #[Rule('required')]
    public $password;
    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $profile_photo_path;

    #[Rule('nullable')] 
    public $status;

    public function mount(){
        $this->js('MultiselectDropdown(window.MultiselectDropdownOptions);');
    }
    public function render()
    {
        return view('livewire.backend.rolepermission.backusercreate',[
            'roles'=>Role::all(),
        ]);
    }

    public function save(){
        $validated = $this->validate();

        if(($this->profile_photo_path)){
         $validated['profile_photo_path'] = $this->profile_photo_path->store('admin_images','public');
        }    
        $arrayData = $validated['current_team_id'];
        $validated['position']= json_encode($arrayData);
        unset($validated['current_team_id']);
        $validated['password'] =  Hash::make($this->password);
        $backuser = Admin::create($validated);
        $backuser->syncRoles($arrayData);
        $this->reset( "name", 
        "email",
        "phone",
        "current_team_id",
        "password",
        "profile_photo_path",
        "status"
        );
        session()->flash('backendusercreate','New User Added');
        $backusers =  Admin::where('id','!=',1)->paginate(10);
        $this->dispatch('backenduserlist', $backusers);
    }
}
