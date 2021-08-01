function toggleMenu() {
	var toggler = document.querySelector('.toggler');
	var nav = document.getElementsByTagName('nav')[0];
	var main = document.getElementById('main');

	toggler.classList.toggle('active');
	nav.classList.toggle('active');
	main.classList.toggle('active');
}