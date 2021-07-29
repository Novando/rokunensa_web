<section id="product-detail" class="small-container">
    <div class="row">
        <div class="col-2">
            <img id="product-img" src="{{asset('img/products')}}/{{$product->image}}" width="100%">
            <div class="small-img-row">
                <div class="small-img-col">
                    <img class="small-img" src="img/gallery-1.jpg" width="100%">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/gallery-2.jpg" width="100%">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/gallery-3.jpg" width="100%">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/gallery-4.jpg" width="100%">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>{{$product->name}}</h1>
            @if($product->sale_price < $product->base_price)
                <h4><del>${{$product->base_price}}</del></h4>
            @endif
            <h4>${{$product->sale_price}}</h4>
            <select name="size">
                <option disabled selected>Size</option>
                <option value="xxl">XXL</option>
                <option value="xl">XL</option>
                <option value="l">L</option>
                <option value="m">M</option>
                <option value="s">S</option>
            </select>
            <input type="number" value="1" name="qty" wire:model="input_qty" min="1" max="{{$product->qty}}">
            <a href="#" class="btn" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$input_qty}}, {{$product->sale_price}})">Add to Cart</a>
            @if(Session::has('success_message'))
                <div class="alert">
                    {{Session::get('success_message')}}
                </div>
            @endif
            <h3>Product Details <span class="material-icons">&#xe23e;</span></h3>
            <br>
            <p>{{$product->desc}}</p>
        </div>
    </div>
</section>

<!--------------- RELATED PRODUCT SECTION --------------->
<section id="products" class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>
    <div class="row">
        @foreach($related as $rel_prod)
            <div class="col-4">
                <a href="{{route('products.details', ['slug'=>$rel_prod->link])}}" title="{{$rel_prod->name}}">
                    <img src="{{asset ('img/products')}}/{{$rel_prod->image}}" alt="{{$rel_prod->name}}">
                </a>
                <h4>{{$rel_prod->name}}</h4>
                <p>
                    @if($rel_prod->sale_price < $rel_prod->base_price)
                        <small><del>${{$rel_prod->base_price}}</del></small>
                    @endif
                    ${{$rel_prod->sale_price}}
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
</section>