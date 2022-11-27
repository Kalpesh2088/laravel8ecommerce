<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }
    public function addslide()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $imagename =Carbon::now()->timestamp. '-'. $this->image->extension();
        $this->image->storeAs('sliders',$imagename);
        $slider->image = $imagename;
        $slider->link = $this->link;
        $slider->price = $this->price;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider Has Been Add Seccessfull!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
