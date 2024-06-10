<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Site;
use Livewire\Component;

class Aboutus extends Component
{
    public function render()
    {
        $site = Site::find(1);
        return view('livewire.frontend.home.aboutus',compact('site'));
    }
}
