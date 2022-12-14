<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use  Session;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOmly($fields,[
            'name' => 'required',
            'slug' => 'required | unique:categories'
        ]);
    }
    public function soreCatrgory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required | unique:categories'

        ]);
        $Category = new Category();
        $Category->name = $this->name;
        $Category->slug = $this->slug;
        $Category->save();
        Session::flash('message','Category Has Been Created Seccessfull!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
