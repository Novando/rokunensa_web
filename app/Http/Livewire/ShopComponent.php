<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $by;

    public function mount(){
        $this->sorting = "desc";
        $this->by = "created_at";
    }

    public function render(){


        $products = Product::orderBy($this->by, $this->sorting)->paginate(12);
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }
}
