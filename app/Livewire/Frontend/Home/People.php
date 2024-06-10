<?php

namespace App\Livewire\Frontend\Home;

use App\Models\ProductImage;
use Livewire\Component;
use App\Models\Purpose as ModelsPurpose;
class People extends Component
{

    public $site;
    public $management;
    public $teammember;
    public function render()
    {
        $purpose=ModelsPurpose::find(2);
        $images =  $product_image = ProductImage::where('product_id', 3)->get();
        return view('livewire.frontend.home.people',compact('purpose','images'));
    }
}
