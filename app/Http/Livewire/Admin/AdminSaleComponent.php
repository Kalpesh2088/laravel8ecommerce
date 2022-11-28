<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sale;

class AdminSaleComponent extends Component
{
    public $sale;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_datel;
        $this->status = $sale->status;
    }
    public function updateSal()
    {
        $sale = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->stutas = $this->status;
        $sale->save();
        session()->flash('message','Recode Has Been Update Seccessfull!');
    }
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}
