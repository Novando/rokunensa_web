<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public $home_menu = 'active';
    public $shop_menu = '';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = '';
    public $order_menu = '';

    public function render()
    {
        $related = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.home-component', [
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
