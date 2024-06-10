<?php

namespace App\Livewire\Backend\Profile;

use Illuminate\Http\Request;
use Livewire\Component;
use Laravel\Jetstream\Jetstream;
class Logoutothersession extends Component
{
    public function render()
    {
        return view('livewire.backend.profile.logoutothersession');
    }
}
