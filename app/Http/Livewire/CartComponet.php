<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponet extends Component
{
    public function increaseQuantity($rowId)
    {
        $Product = Cart::get($rowId);
        $qty = $Product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $Product = Cart::get($rowId);
        $qty = $Product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('seccess_massage','Item Has Been Removed');
    }

    public function destroyAll()
    {
        Cart::destroy();
    }
    
    public function render()
    {
        return view('livewire.cart-componet')->layout('layouts.base');
    }
}
