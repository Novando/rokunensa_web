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
    public $home_menu = '';
    public $shop_menu = 'active';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = '';
    public $order_menu = '';

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
        
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base', [
            'home_menu' => $this->home_menu,
            'shop_menu' => $this->shop_menu,
            'contact_menu' => $this->contact_menu,
            'blog_menu' => $this->blog_menu,
            'profile_menu' => $this->profile_menu,
            'order_menu' => $this->order_menu,
        ]);
    }
}
