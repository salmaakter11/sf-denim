<?php

namespace App\Livewire\Frontend\Body;

use App\Models\Category;
use App\Models\Site;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Rule;

class Header extends Component
{
    #[Rule('nullable')]
    public $searchItem;
    #[On('header')]
    #[Lazy]
    public function render()
    {
        $site = Site::first();
        sleep(3);
        return view('livewire.frontend.body.header', compact('site'));
    }

}
