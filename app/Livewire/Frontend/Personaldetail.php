<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Validate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Personaldetail extends Component
{
    public $userdata;
    #[Rule('required')]
    public $user_name;
    #[Rule('required|email|max:250')]
    public $user_email;
    #[Validate('regex:/\+8801[0-9]{9}/', message: 'The phone field format is invalid. Valid format: +8801[9 digit]')]
    #[Validate('required', message: 'Please provide your valid phome number')]
    #[Validate('min:13', message: 'This phone you gave is too short')]
    #[Validate('max:17', message: 'This phone you gave is too large')]
    public $user_phone;

    public function mount(){
        $user = User::find(Auth::id());
        if($user){
            $this->user_name = $user->name;
            $this->user_email = $user->email;
            $this->user_phone = $user->phone;
        }   
    }

    public function render()
    {
        return view('livewire.frontend.personaldetail');
    }
    public function Update(){
        $validated = $this->validate();
        $user = User::find(Auth::id());
        $user->name = $this->user_name;
        $user->email = $this->user_email;
        $user->phone = $this->user_phone;
        $user->update();
        session()->flash('personaldetal','Personal Details Updated');   
        // $this->dispatch('orderpage');
        // $this->dispatch('open-modal', ['name' => 'ordernow']);
        $this->js('window.location.reload()'); 
    }
}
