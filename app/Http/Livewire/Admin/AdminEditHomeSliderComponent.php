<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->image = $slider->image;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->price = $slider->price;
        $slider->id = $slider->slider_id;
    }
    public function updateSlide()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        if($this->newimage)
        {
            $imageName =Carbon::now()->timestamp. '-'. $this->newimage->extension();
        $this->newimage->storeAs('slider',$imageName);
        $slider->image = $imageName;
        }
        
        $slider->link = $this->link;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','slider Has Been Update Seccessfull!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
