<section id="cart" class="small-container">
    <h3 class="page-title">
        @if(Session::has('success_message'))
            <div class="alert">
                {{Session::get('success_message')}}
            </div>
        @endif
        Your Cart
        @if(Cart::count() > 0)
            </h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td>
                            <div class="cart-info">
                                <a href="{{route('products.details', $item->model->link)}}">
                                    <img src="{{asset('img/products')}}/{{$item->model->image}}">
                                </a>
                                <div>
                                     <a href="{{route('products.details', $item->model->link)}}">
                                        <p>{{$item->model->name}}</p>
                                    </a>
                                    <small>${{$item->model->sale_price}}</small>
                                    <a href="" class="remove" wire:click.prevent="destroyItem('{{$item->rowId}}')">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td class="qty">
                            <a href="#" class="min" wire:click.prevent="decreaseQty('{{$item->rowId}}')">-</a>
                            {{$item->qty}}
                            <a href="#" class="plus" wire:click.prevent="increaseQty('{{$item->rowId}}')">+</a>
                        </td>
                        <td>${{$item->subtotal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>${{Cart::subtotal()}}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>${{Cart::tax()}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{Cart::total()}}</td>
                    </tr>
                    <tr>
                        <td><a href="" class="btn" wire:click.prevent='setAmount'>Check Out</a></td>
                    </tr>
                </table>
            </div>
        @else
            &#160;is Empty</h3>
            <div>
                <a href="#" class="btn">Shop Now</a>
            </div>
        @endif

</section>