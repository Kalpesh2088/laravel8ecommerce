<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $select_categories =[];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->select_categories = explode(',',$category->sel_categories);
        $this->numberofproducts = $category->no_of_products;
    }
    public function updatHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implod(',',$this->select_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        session()->flash('message','Home Category Has Been Update Seccessfull!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=> $categories])->layout('layouts.base');
    }
}
