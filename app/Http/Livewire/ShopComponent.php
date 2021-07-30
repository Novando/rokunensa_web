<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $search;
    public $category;
    public $sorting;
    public $by;

    public function mount(){
        $this->search = '';
        $this->category = "*";
        $this->sorting = "desc";
        $this->by = "date";
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render(){
        switch ($this->by) {
            case 'price':
                $by = 'sale_price';
                break;
            case 'sale':
                $by = 'sold';
                break;
            case 'rating':
                $by = 'rating';
                break;
            default:
                $by = 'created_at';
                break;
        }

        if ($this->category === "*") {
            $products = Product::where('name', 'LIKE', '%'.$this->search.'%')->orderBy($by, $this->sorting)->paginate(12);
        } else {
            $products = Product::where([
                ['name', 'LIKE', '%'.$this->search.'%'],
                ['category_id', '=', $by]
            ])->orderBy($by, $this->sorting)->paginate(12);
        }
        
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }
}
