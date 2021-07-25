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
			<span class="material-icons menu">&#xe8cc;</span>
		</div>
	</div>
	<nav>
		<div class="logo">
			<img src="img/rokunensa_b.png">
		</div>
		<ul id="MenuItems">
			<li><a href="" class="active">Home</a></li>
			<li><a href="">Product</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Blog</a></li>
			<li><a href="">Account</a></li>
			<li><span class="material-icons">&#xe8cc;</span></li>
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