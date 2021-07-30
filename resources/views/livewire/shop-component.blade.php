<section id="products" class="small-container">
    <div class="row row-2">
        <h2>All Product</h2>
    </div>
        <div class="row">
            <div class="search">
                <div class="search-icon"></div>
                    <span class="search-clear"></span>
                <div class="search-input">
                    <input type="text" name="seacrh" placeholder="I'm seaching..." wire:model.debouncing.1000ms="search">
                </div>
            </div>
            <select wire:model="category">
                <option value="*">All Categories</option>
                <option value="1">T-Shirts</option>
                <option value="2">Jackets</option>
                <option value="3">Pants</option>
                <option value="4">Shoes</option>
                <option value="5">Watches</option>
            </select>
            <select wire:model="by">
                <option value="date">Sort by Date</option>
                <option value="price">Short by Price</option>
                <option value="rating">Short by Rating</option>
                <option value="sale">Short by Sale</option>
            </select>
            <select wire:model="sorting">
                <option value="DESC">Descending &#8595;</option>
                <option value="ASC">Ascending &#8593;</option>
            </select>
        </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-4">
                <a href="{{route('products.details', ['slug'=>$product->link])}}" title="{{$product->name}}">
                    <img src="{{asset('img/products')}}/{{$product->image}}" alt="{{$product->name}}">
                </a>
                <h4>{{$product->name}}</h4>
                <p>
                    @if($product->sale_price < $product->base_price)
                        <small><del>${{$product->base_price}}</del></small>
                    @endif
                    ${{$product->sale_price}}
                </p>
                <span class="material-icons rating">
                    &#xe838;
                    &#xe838;
                    &#xe838;
                    &#xe839;
                    &#xe83a;
                </span>
            </div>
        @endforeach
        @if (!isset($product))
            <div class="col-4">
                <h4>Products not found</h4>
            </div>
        @endif
    </div>
    <div class="row">
        {{$products->onEachSide(0)->links('pagination-link')}}
    </div>
</section>