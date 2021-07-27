<section id="products" class="small-container">
    <div class="row row-2">
        <h2>All Product</h2>
        <select>
            <option disabled selected>Sort by</option>
            <option>Short by Price</option>
            <option>Short by Rating</option>
            <option>Short by Sale</option>
        </select>
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-4">
                <a href="" title="{{$product->name}}">
                    <img src="{{'img/products/' . $product->image}}" alt="{{$product->name}}">
                </a>
                <h4>{{$product->name}}</h4>
                <p>{{$product->sale_price}}</p>
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