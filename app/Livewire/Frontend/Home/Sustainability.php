<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Sustailability;
use Livewire\Component;

class Sustainability extends Component
{

    public $site;
    public $sustailability;
    public function render()
    {
       
        return view('livewire.frontend.home.sustainability');
    }
}
