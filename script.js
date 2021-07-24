var MenuItems = document.getElementById('MenuItems');

MenuItems.style.maxHeight = "0px";

function menuToggle() {
	if (MenuItems.style.maxHeight == "0px") {
		MenuItems.style.maxHeight = "200px";
	} else {
		MenuItems.style.maxHeight = "0px";
	}
}

////// PRODUCT DETAIL PAGE'S SCRIPT //////
var ProductImg = document.getElementById('product-img');
var SmallImg = document.getElementsByClassName('small-img');

SmallImg[0].onmouseover = function() {
	ProductImg.src = SmallImg[0].src;
}
SmallImg[1].onmouseover = function() {
	ProductImg.src = SmallImg[1].src;
}
SmallImg[2].onmouseover = function() {
	ProductImg.src = SmallImg[2].src;
}
SmallImg[3].onmouseover = function() {
	ProductImg.src = SmallImg[3].src;
}