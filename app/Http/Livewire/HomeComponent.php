<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $related = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.home-component', [
            'related' => $related
        ])->layout('layouts.base');
    }
}
