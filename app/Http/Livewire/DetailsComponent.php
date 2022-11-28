<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\Sale;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($Product_id,$Product_name,$Product_price)
    {
        Cart::add($Product_id,$Product_name,1,$Product_price)->associate('App\Models\Product');
        session()->flash('seccess_massage', 'Item add in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $Product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$Product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',['Product' => $Product,'popular_products' => $popular_products,'related_products' => $related_products,'sale'=>$sale])->layout('layouts.base');
    }
}
