function toggleMenu() {
	var toggler = document.querySelector('.toggler');
	var nav = document.getElementsByTagName('nav')[0];
	var main = document.getElementById('main');

	toggler.classList.toggle('active');
	nav.classList.toggle('active');
	main.classList.toggle('active');
}

function navigate(order) {
	// for (var i = 0; i < 8; i++) {
	// 	var init = document.getElementsByTagName('a')[i];

	// 	if (init.classList.contains('active')){
	// 		init.classList.remove('active');
	// 	}
	// }
	var nav = document.getElementsByTagName('a')[order];

	nav.classList.add('active');
}