<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class Categorycomponent extends Component
{
    public $sorting;
    public $pagesize;
    public $Category_slug;

    public function mount($Category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->Category_slug = $Category_slug;
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
        $Category = Category::where('slug',$this->Category_slug)->first();
        $Category_id = $Category->id;
        $Category_name = $Category->name;
        if($this->sorting=="date")
        {
            $products = Product::where('Category_id',$Category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price")
        {
            $products = Product::where('Category_id',$Category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price-desc") 
        {
            $products = Product::where('Category_id',$Category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::where('Category_id',$Category_id)->paginate($this->pagesize);
        }
        $categories = Category::all();
        
        return view('livewire.Category-component',['products' => $products ,'categories' => $categories,'Category_name' =>$Category_name])->layout('layouts.base');
    }
}
