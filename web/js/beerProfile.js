var beerProfile = {
	initialize: function () {
		var fridge = $('a#profileFridge');
		var backButton = $('a#profileClose');
		var beerId = fridge.attr('data-beerid');
		var addRoute = fridge.attr('data-addtocoolerajaxroute');
		var deleteRoute = fridge.attr('data-removefromcoolerajaxroute');

		fridge.on('click', function(event) {
			event.preventDefault();
			if (fridge.children('img').attr('src') == '/../img/fridge.png') {
				console.log(beerId);

				$.ajax({
					url: addRoute,
					type: 'POST',
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					data: {beerId : beerId},
					success: function  (data) {
						fridge.children('img').attr('src', '/../img/frigovert.png');
					}
				})
			} else {
				console.log(beerId);
				$.ajax({
					url: deleteRoute,
					type: 'POST',
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					data: {beerId : beerId},
					success: function  (data) {
						fridge.children('img').attr('src', '/../img/fridge.png');
					}
				})
			};
		});
		backButton.on('click', function(event) {
			event.preventDefault();
			console.log('yeah');
			window.history.go(-1);

		});
	}
}
beerProfile.initialize();