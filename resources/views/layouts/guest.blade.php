{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
 --}}

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
            <a href="/"><img src="{{asset('img/rokunensa_b.png')}}"></a>
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
                        <li><p>Hi, {{Auth::user()->name}}</p></li>
                    @else
                        <li><a href="{{route('user.dashboard')}}" class="menu-list">Dashboard</a></li>
                        <li><a href="{{route('logout')}}" onclick="logout()">Logout</a></li>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">@csrf</form>
                        <li><p>Hi, {{Auth::user()->name}}</p></li>
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
                    <img src="{{ asset('img/rokunensa_w.png')}}">
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
    @livewireScripts
</body>
</html>