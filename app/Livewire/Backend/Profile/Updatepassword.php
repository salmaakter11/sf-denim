<?php

namespace App\Livewire\Backend\Profile;

use App\Models\Admin;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class Updatepassword extends Component
{
    #[Rule('required|max:250|min:6')]
    public $current_password;
    #[Rule('required|max:250|min:6')]
    public $password;

    #[Rule('required|max:250|min:6|')]
    public $password_confirmation;


    public function render()
    {
        return view('livewire.backend.profile.updatepassword');
    }
    public function updatePassword()
    {
        $id = Auth::guard('admin')->id();
        $backuser = Admin::find($id);
        if($this->password == $this->password_confirmation){
            if (Hash::check($this->current_password, $backuser->password)){
                $backuser->update([
                    'password' => Hash::make($this->password),
                ]);
                session()->flash('updatepassword', 'Password changed successfully.');
            }else{
                session()->flash('updatepassword', 'Password Not Matched.');
            }
        }else{
            session()->flash('updatepassword', 'Password Confirmation not valid.');
        }

    }
}
