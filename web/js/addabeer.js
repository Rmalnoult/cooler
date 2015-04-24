var addabeer = {
	initialize: function () {

		addabeer.onAddABeerButtonClick();

	},
	/**
	 * when the addabeer button is clicked on homepage : animate the button to transform into an input field
	 */
	onAddABeerButtonClick: function () {

		var button = $('.circleButton.addabeer');
		var input = $('input#addabeer');
		var form = $('form');
		var headerIcons = $('.header img');
		var circleButtons = $('.circleButton');
		var backButton = $('a.backButton');
		var backButtonImg = $('a.backButton img');


		
		button.on('click', function(event) {
			event.preventDefault();


			circleButtons.animate({
				width: 0,
				height: 30,
				fontSize: 0,
				padding: 0},
				300, function() {

					headerIcons.animate({opacity: 0}, 300);
					backButtonImg.animate({opacity: 1}, 300);
					input.addClass('active');
					circleButtons.animate({opacity: 0}, 300);
					backButton.show('fast');
					input.focus();
					form.animate({top: 8}, 300)
					input.animate({
						width: '90%',
						height: 30,
						'padding' : 0,
						borderWidth: 0,
						borderRadius: 0},
						300);
					input.val('');
			});
			addabeer.onBackButtonClick();
		});
	},
	onBackButtonClick: function  () {
		var button = $('.circleButton.addabeer');
		var input = $('input#addabeer');
		var form = $('form');
		var headerIcons = $('.header img');
		var circleButtons = $('.circleButton');
		var backButton = $('a.backButton');
		var backButtonImg = $('a.backButton img');

		backButton.on('click', function(event) {
			event.preventDefault();

			$('ul#autocomplete').empty();
			headerIcons.animate({opacity: 1}, 300);
			backButtonImg.animate({opacity: 0}, 300);
			
			circleButtons.animate({opacity: 1}, 300);
			backButton.hide('fast');
			input.focusout();
			
			form.animate({top: 130}, 300);
			input.animate({
				width: 0,
				height: 0,
				'padding-top' : 0,
				'padding-right' : 0,
				'padding-bottom' : 0,
				'padding-left' : 0,
				borderWidth: 5,
				borderRadius: 13},
				150, function () {
					
					circleButtons.animate({
						'width': '79%',
						height: '22px',
						fontSize: '1.2em',
						padding: 9},
						200, function() {
							input.removeClass('active');

					});

				});


		});
	}
}
addabeer.initialize();