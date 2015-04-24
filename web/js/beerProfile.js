var beerProfile = {
	initialize: function () {
		var fridge = $('a#profileFridge');
		var beerId = $('.variables').attr('beerid');
		var route = $('#profileFridge').attr('ajaxroute');

		fridge.on('click', function(event) {
			event.preventDefault();
			var beerId = $(this).attr('id');
			var fridge = $('a#profileFridge');
			$.ajax({
				url: route,
				type: 'POST',
				contentType: "application/x-www-form-urlencoded;charset=UTF-8",
				data: {beerId : beerId},
				success: function  (data) {
					fridge.children('img').attr('src', '/../img/frigovert.png');
				}
			})
		});
	}
}
beerProfile.initialize();