<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Facility as ModelsFacility;
use Livewire\Component;

class Facility extends Component
{

    public $site;
    public $facility;
    public function render()
    {
        $facility = ModelsFacility::find(1);
        return view('livewire.frontend.home.facility',compact('facility'));
    }
}
