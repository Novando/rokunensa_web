<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $home_menu = '';
    public $shop_menu = '';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = '';
    public $order_menu = '';

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

    public function checkout(){
        session()->put('checkout', [
            'coupon' => 'TEST',
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total()
        ]);
    }

    public function setAmount(){
        if(Auth::check()){
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base', [
            'home_menu' => $this->home_menu,
            'shop_menu' => $this->shop_menu,
            'contact_menu' => $this->contact_menu,
            'blog_menu' => $this->blog_menu,
            'profile_menu' => $this->profile_menu,
            'order_menu' => $this->order_menu,
        ]);
    }
}
