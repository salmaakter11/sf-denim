<?php

namespace App\Livewire\Frontend\Body;

use App\Models\Category;
use App\Models\Site;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $site = Site::first();
       
        return view('livewire.frontend.body.footer', compact('site'));
    }
}
