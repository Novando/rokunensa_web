////// HEADER SECTION SCRIPT //////
function menuToggle() {
	var MenuItems = document.getElementById('MenuItems');
	if (MenuItems.style.maxHeight <= "1px") {
		MenuItems.style.maxHeight = "200px";
	} else {
		MenuItems.style.maxHeight = "0px";
	}
}

////// PRODUCT DETAIL PAGE'S SCRIPT //////
SmallImg[0].onmouseover = function() {
	var ProductImg = document.getElementById('product-img');
	var SmallImg = document.getElementsByClassName('small-img');
	ProductImg.src = SmallImg[0].src;
}

SmallImg[1].onmouseover = function() {
	var ProductImg = document.getElementById('product-img');
	var SmallImg = document.getElementsByClassName('small-img');
	ProductImg.src = SmallImg[1].src;
}

SmallImg[2].onmouseover = function() {
	var ProductImg = document.getElementById('product-img');
	var SmallImg = document.getElementsByClassName('small-img');
	ProductImg.src = SmallImg[2].src;
}

SmallImg[3].onmouseover = function() {
	var ProductImg = document.getElementById('product-img');
	var SmallImg = document.getElementsByClassName('small-img');
	ProductImg.src = SmallImg[3].src;
}

////// ACCOUNT PAGE'S SCRIPT //////
function register() {
	var LoginForm = document.getElementById('login-form');
	var RegisterForm = document.getElementById('register-form');
	var Indicator = document.getElementById('indicator');
	RegisterForm.style.transform = 'translateX(300px)';
	LoginForm.style.transform = 'translateX(300px)';
	Indicator.style.transform = 'translateX(0px)';
}

function login() {
	var LoginForm = document.getElementById('login-form');
	var RegisterForm = document.getElementById('register-form');
	var Indicator = document.getElementById('indicator');
	RegisterForm.style.transform = 'translateX(0px)';
	LoginForm.style.transform = 'translateX(0px)';
	Indicator.style.transform = 'translateX(100px)';
}