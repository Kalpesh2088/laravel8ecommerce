<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function store($Product_id, $Product_name, $Product_price)
    {
        Cart::add($Product_id, $Product_name, 1, $Product_price)->associate('App\Models\Product');
        session()->flash('seccess_massage', 'Item add in Cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if ($this->sorting == "date") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('Category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == "price") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('Category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == "price-desc") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('Category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('Category_id', 'like', '%' . $this->product_cat_id . '%')->paginate($this->pagesize);
        }
        $categories = Category::all();

        return view('livewire.search-component',['products' => $products ,'categories' => $categories])->layout('layouts.base');
    }
}
