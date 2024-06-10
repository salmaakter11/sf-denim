<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Client;
use App\Models\ProductImage;
use App\Models\Story as ModelsStory;
use Livewire\Component;

class Story extends Component
{

    public $site;
    public function render()
    {
        $story = ModelsStory::find(1);
        $images =  $product_image = ProductImage::where('product_id', 1)->get();
        return view('livewire.frontend.home.story',compact('story','images'));
    }
}
