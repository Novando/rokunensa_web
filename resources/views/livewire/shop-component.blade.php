<section id="products" class="small-container">
    <div class="row row-2">
        <h2>All Product</h2>
        <select wire:model="by">
            <option value="created_at">Sort by Date</option>
            <option value="sale_price">Short by Price</option>
            <option value="rating">Short by Rating</option>
            <option value="sold">Short by Sale</option>
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
    </div>
    <div class="row">
        {{$products->onEachSide(0)->links('pagination-link')}}
    </div>
</section>