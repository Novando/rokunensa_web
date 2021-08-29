<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $input_qty;
    public $home_menu = '';
    public $shop_menu = 'active';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = '';
    public $order_menu = '';

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_qty, $product_price){
        Cart::add($product_id, $product_name, $product_qty, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', $product_qty . 'x '. $product_name . ' added to cart.');
    }

    public function render()
    {
        $product = Product::where('link', $this->slug)->first();
        $related = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component', [
            'product' => $product,
            'related' => $related
        ])->layout('layouts.base', [
            'home_menu' => $this->home_menu,
            'shop_menu' => $this->shop_menu,
            'contact_menu' => $this->contact_menu,
            'blog_menu' => $this->blog_menu,
            'profile_menu' => $this->profile_menu,
            'order_menu' => $this->order_menu,
        ]);
    }
}
