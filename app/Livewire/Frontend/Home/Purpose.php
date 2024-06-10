<?php

namespace App\Livewire\Frontend\Home;

use App\Models\ProductImage;
use App\Models\Purpose as ModelsPurpose;
use Livewire\Component;

class Purpose extends Component
{

    public $site;
    public function render()
    {
        $purpose=ModelsPurpose::find(1);
        $images =  $product_image = ProductImage::where('product_id', 2)->get();
        return view('livewire.frontend.home.purpose',compact('purpose','images'));
    }
}
