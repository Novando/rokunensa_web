<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Rokunensa</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/google-icon-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome-style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ URL::asset('photo/box2.svg') }}" type="image/x-icon"/>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/user/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="responsive-bar">
        <div class="extra-menu">
            <span class="material-icons menu" onclick="menuToggle()">&#xe5d2;</span>
            <a href="/shop"><span class="material-icons menu">&#xe8cc;</span></a>
        </div>
    </div>
    <nav>
        <div class="logo">
            <a href="/"><img src="{{asset('img/logos/rokunensa_b.png')}}"></a>
        </div>
        <ul id="MenuItems">
            <li><a href="/" class="menu-list active">Home</a></li>
            <li><a href="/shop" class="menu-list">Shop</a></li>
            <li><a href="" class="menu-list">Contact</a></li>
            <li><a href="" class="menu-list">Blog</a></li>
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <li><a href="{{route('admin.dashboard')}}" class="menu-list">Dashboard</a></li>
                        <li><a href="{{route('logout')}}" onclick="logout()">Logout</a></li>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">@csrf</form>
                        <li><p>Hi, {{Auth::user()->username}}</p></li>
                    @else
                        <li><a href="{{route('user.dashboard')}}" class="menu-list">Dashboard</a></li>
                        <li><a href="{{route('logout')}}" onclick="logout()">Logout</a></li>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">@csrf</form>
                        <li><p>Hi, {{Auth::user()->username}}</p></li>
                    @endif
                @else
                    <li><a href="{{route('login')}}" class="menu-list">Account</a></li>
                @endif
            @endif
            <li><a href="/cart"><span class="material-icons">&#xe8cc;</span></a></li>
        </ul>
    </nav>

    {{$slot}}

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <img src="{{ asset('img/logos/rokunensa_w.png')}}">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    <div class="social">
                        <ul>
                            <li><a href="" class="fa fa-facebook"></a></li>
                            <li><a href="" class="fa fa-instagram"></a></li>
                            <li><a href="" class="fa fa-twitter"></a></li>
                            <li><a href="" class="fa fa-youtube-play"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">&#xa9;Rokunensa 2021</p>
        </div>
    </footer>

    <!--------------- JAVASCRIPT IMPORT --------------->
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-script.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

    function product_size()
            {
                var id =JSON.stringify($('#product-list').val());
                
                $.ajax({
                    url:"{{ route('admin.stockshow') }}",
                    method:'GET',
                    data:{
                             id:id,
                        },
                    dataType:'json',
                    success:function(data)
                    {
                        $('#stock-list').html(data.table_data);
                    }
                })
            }

            $(document).on('change','#product-list',function(){
                product_size();
            });
        
    </script>
    @livewireScripts

</html>

