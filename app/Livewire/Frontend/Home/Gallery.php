<?php

namespace App\Livewire\Frontend\Home;

use App\Models\ProductImage;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $images =  $product_image = ProductImage::where('product_id', 7)->get();
        return view('livewire.frontend.home.gallery',compact('images'));
    }
}
