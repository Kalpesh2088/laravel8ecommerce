<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;
use App\Http\Livewire\SearchComponent;



class ShopComponet extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function store($Product_id,$Product_name,$Product_price)
    {
        Cart::add($Product_id,$Product_name,1,$Product_price)->associate('App\Models\Product');
        session()->flash('seccess_massage', 'Item add in Cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if($this->sorting=="date")
        {
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price")
        {
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price-desc") 
        {
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::paginate($this->pagesize);
        }
        $categories = Category::all();
        
        return view('livewire.shop-componet',['products' => $products ,'categories' => $categories])->layout('layouts.base');
    }
}
