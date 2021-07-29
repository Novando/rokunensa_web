<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decreaseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function destroyItem($rowId){
        Cart::remove($rowId);
        session()->flash('success_message', 'Item(s) removed');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
