<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class AdminProductComponent extends Component
{
    public function render()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('livewire.admin.admin-product-component', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
