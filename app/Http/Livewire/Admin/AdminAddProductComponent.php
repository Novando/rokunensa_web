<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $SKU;
    public $link;
    public $desc;
    public $prod_cost;
    public $base_price;
    public $sale_price;
    public $featured;
    public $image;
    public $images;
    public $category_id;
    public $discount;

    public function mount(){
        $this->name = '';
        $this->SKU = '';
        $this->prod_cost = 0;
        $this->base_price = 1;
        $this->sale_price = 1;
        $this->featured = 0;
        $this->link = '';
        $this->category_id = 1;
    }

    public function updatedImage(){
        $this->validate([
            'image' => 'dimensions:ratio=3/4,min_height=1440,min_width=1080|max:1024'
        ]);
    }
    
    public function addProduct(){
        $this->validate([
            'image' => 'dimensions:ratio=3/4,min_height=1440,min_width=1080|max:1024'
        ]);
        $image_name = $this->SKU . '-' . Product::where('SKU', $this->SKU)->count() . '.' . $this->image->extension();
        $add_product = new Product();
        $add_product->name = $this->name;
        $add_product->SKU = $this->SKU;
        $add_product->link = $this->link;
        $add_product->desc = $this->desc;
        $add_product->prod_cost = $this->prod_cost;
        $add_product->base_price = $this->base_price;
        $add_product->sale_price = $this->sale_price;
        $add_product->featured = $this->featured;
        $add_product->image = $image_name;
        $add_product->category_id = $this->category_id;
        $add_product->save();
        $this->image->storeAs(
            'img/products/' . $this->SKU,
            $image_name,
            'local'
            );
        session()->flash('message', 'Product added successfully');
    }

    public function generateLink(){
        $get_category = Category::where('id', $this->category_id)->first();
        $category_name = $get_category->name;
        $total = Product::where('category_id', $this->category_id)->count();
        $number = 0;
        if ($total < 10) {
            $number = '000' . ($total + 1);
        } elseif ($total < 100) {
            $number = '00' . ($total + 1);
        } elseif ($total < 1000) {
            $number = '0' . ($total + 1);
        } elseif ($total < 10000) {
            $number = ($total + 1);
        } else {
            ErrorException;
        }
        $this->SKU = preg_replace('/[[:space:]]+/', '-', strtoupper(substr($category_name, 0, 4) . $number));
        $this->link = Str::slug(strtolower($this->SKU) . $this->name);
    }

    public function render(){
        if ($this->base_price === '') {
            $this->base_price = 1;
        }
        if ($this->sale_price === '') {
            $this->sale_price = 0;
        }
        $categories = Category::orderby('name')->get();
        $this->discount = round(100-($this->sale_price / $this->base_price * 100));
        return view('livewire.admin.admin-add-product-component', [
            'categories' => $categories,
            'SKU' => $this->SKU,
            'link' => $this->link,
        ]);
    }
}
