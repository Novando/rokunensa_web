////// SMOOTH SCROLL //////
$(window).on('scroll', function() {
	if ($(window).scrollTop()) {
		$('nav').addClass('nav-scrolled');
	} else {
		$('nav').removeClass('nav-scrolled');
	}
})