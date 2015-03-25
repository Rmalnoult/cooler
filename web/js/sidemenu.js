var sidemenu = {
	onMenuButtonClick: function () {
		$('#menuButton').on('click', function(event) {
			event.preventDefault();
			if (sidemenu.isActive()) {
				sidemenu.closeMenu();
			} else {
				sidemenu.openMenu();
			};
			event.stopPropagation();
		});
	},
	openMenu: function () {
		console.log('open menu');
		$('div.sidemenu').animate({
			left: "0"},
			300, function() {
		});
		$('a#menuButton').animate({
			left: "200"},
			300, function() {
		});
		$('div.container').removeClass('opactityOff');
		$('div.container').addClass('opacityOn');

		$('div.sidemenu').addClass('active');


    	// when the screen is clicked (outside of the lightbox), lightbox closes
    	$('.container').click(function() {
    		 if ($('div.sidemenu').hasClass('active') ) {
				sidemenu.closeMenu();
    		 }	     		
    	});

	},
	closeMenu: function () {
		
		console.log('close menu');
		$('div.sidemenu').animate({
			left: "-300px"},
			300, function() {
		});
		$('a#menuButton').animate({
			left: "9px"},
			300, function() {
		});
		$('div.container').removeClass('opacityOn');
		$('div.container').addClass('opactityOff');
		$('div.sidemenu').removeClass('active');

	},
	isActive: function () {
		if ($('div.sidemenu').hasClass('active')) {
			return true;
		} else {
			return false;
		};
	}
}
sidemenu.onMenuButtonClick();