<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\Category;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SRK;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SRK = $product->SRK;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name , '-');
    }
    public function updated($fields)
    {
        $this->validateOmly($fields,[
            'name' => 'required',
            'slug' => 'required | unique:categories',
            'short_description' => 'required',
            'regular_price' => 'required | numeric',
            'sale_price' => 'numeric',
            'SRK' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required | numeric',
            'newimage' => 'required |mimes:jpeg,png',
            'description' => 'required',
            'category_id' => 'required'
        ]);
    }
    public function UpdateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required | unique:products',
            'short_description' => 'required',
            'regular_price' => 'required | numeric',
            'sale_price' => 'numeric',
            'SRK' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required | numeric',
            'newimage' => 'required |mimes:jpeg,png',
            'description' => 'required',
            'category_id' => 'required'

        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SRK = $this->SRK;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->newimage)
        {
            $imageName =Carbon::now()->timestamp. '-'. $this->newimage->extension();
        $this->newimage->storeAs('products',$imageName);
        $product->image = $imageName;
        }
        
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','product Has Been Update Seccessfull!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=> $categories])->layout('layouts.base');
    }
}
