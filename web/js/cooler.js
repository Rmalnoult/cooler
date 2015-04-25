var cooler = {
	initialize: function () {
		console.log('hello cooler.js');

		var fridge = $('a#profileFridge');
		var backButton = $('a#backIcon');

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

		backButton.on('click', function(event) {
			event.preventDefault();
			console.log('yeah');
			window.history.go(-1);

		});


	}
}

cooler.initialize();