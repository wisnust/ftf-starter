jQuery(document).ready(function($) {
	

	// Navbar Toggler
	function navbar_toggler() {
		$('.navbar-toggler').click(function(event) {
			$(this).toggleClass('is-active');
		});
	}
	navbar_toggler();


});