<?php

namespace App\Livewire\Frontend\Search;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SearchItem extends Component
{
    public $name;
    public $search;
    public  $product;
    public  $category_name;
    public function render()
    {
        
        $categories = Category::where('status',1)->get();
        if ($this->product == null ||count($this->product)==0) {
            $this->product = Product::orWhere('category_id','LIKE', '%'.$this->name.'%')
            ->orWhere('title_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('title_en','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_en','LIKE', '%'.$this->name.'%')
            ->where('status',1)->orderBy('id','asc')->get();
        }
        $products=  $this->product;
        return view('livewire.frontend.search.search-item',compact('products','categories'));
    }
    public function setvalue($id)
    {
        $product = Product::with('ProductImage')->find($id);
        $this->dispatch('product_detail_modal', $product);
    }
    public function addtocart($id)
    {
        $product = Product::with('ProductImage')->find($id);
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->title_en,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 1,
            'options' => [
                'image' => $product->ProductImage[0]->path,
                'discount' =>  $product->discount,
                'name_bn' => $product->title_bn,
            ],
        ]);
        Cart::setDiscount($cart->rowId, $product->discount, 'percentage', 'Simple Discount');
        $carts = Cart::content();
        $this->dispatch('header',$carts);
    }
    public function  fetchData()
    {
        $this->product = Product::orWhere("title_bn", 'LIKE', '%' . $this->search . '%')
        ->orWhere("title_en", 'LIKE', '%' . $this->search . '%')
        ->where('category_id','LIKE', '%'.$this->name.'%')
        ->get();
    }
    public function sort($id){
        if($id==1){
            $this->product = Product::orWhere('category_id','LIKE', '%'.$this->name.'%')
            ->orWhere('title_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('title_en','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_en','LIKE', '%'.$this->name.'%')
            ->where('status',1)->orderBy('id','asc')->get();
            $this->js('document.getElementById("sortcurrent").innerHTML = "Sort by Newness";');
        }
        if($id==2){
            $this->product = Product::orWhere('category_id','LIKE', '%'.$this->name.'%')
            ->orWhere('title_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('title_en','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_en','LIKE', '%'.$this->name.'%')->where('status',1)->orderBy('price','asc')->get();
            $this->js('document.getElementById("sortcurrent").innerHTML = "Sort by price: low to high";');
        }
        if($id==3){
            $this->product = Product::orWhere('category_id','LIKE', '%'.$this->name.'%')
            ->orWhere('title_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('title_en','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_en','LIKE', '%'.$this->name.'%')->where('status',1)->orderBy('price','desc')->get();
            $this->js('document.getElementById("sortcurrent").innerHTML = "Sort by price: high to low";');
        }
        if($id==4){
            $this->product = Product::orWhere('category_id','LIKE', '%'.$this->name.'%')
            ->orWhere('title_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('title_en','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_bn','LIKE', '%'.$this->name.'%')
            ->orWhere('desc_en','LIKE', '%'.$this->name.'%')->where('status',1)->orderBy('title_en','asc')->get();
            $this->js('document.getElementById("sortcurrent").innerHTML = "Product Name: A-Z";');
        }
    }
}
