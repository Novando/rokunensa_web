<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $input_qty;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_qty, $product_price){
        Cart::add($product_id, $product_name, $product_qty, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', $product_qty . 'x '. $product_name . ' added to cart.');
        // return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('link', $this->slug)->first();
        $related = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component', [
            'product' => $product,
            'related' => $related
        ])->layout('layouts.base');
    }
}
