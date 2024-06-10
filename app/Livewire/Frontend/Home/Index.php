<?php

namespace App\Livewire\Frontend\Home;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Index extends Component
{

    public $site;
    public $banner;
    // public function placeholder()
    // {
    //     return view('frontend.placeholder');
    // }
    // #[Lazy]
    public function render()
    {
        // return view('frontend.placeholder');
        // sleep(3);
        return view('livewire.frontend.home.index');
    }
}
