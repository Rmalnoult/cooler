var cooler = {
	initialize: function () {
		console.log('hello cooler.js');

		var fridge = $('a#profileFridge');
		fridge.on('click', function(event) {
			event.preventDefault();

			var beerId = fridge.attr('data-beerid');
			var route = fridge.attr('data-ajaxroute');
			var userId = 99;

			$.ajax({
				url: route,
				type: 'POST',
				contentType: "application/x-www-form-urlencoded;charset=UTF-8",
				data: {beerId : beerId},
				success: function  (data) {
					console.log('success');
					// fridge.children('img').attr('src', '');
				}
			})
		});
	}
}

cooler.initialize();