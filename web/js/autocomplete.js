var autocomplete = {
	initialize: function () {
		var input = $('input#addabeer');

		input.on('keyup', function(event) {
			event.preventDefault();

			var term = input.val();
			if (term.length >= 2) {
				var autocompleteRoute = input.attr('data-autocompleteroute');
				var userId = $('span.variables').attr('data-userid')
				$.ajax({
					url: autocompleteRoute,
					type: 'POST',
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					data: {term : term, userId: userId},
					success: function  (data) {
						$('ul#autocomplete').empty();
						for (var i = 0; i < data.length; i++) {
							// console.log(data[i].name);
							var url = $('span.variables').attr('data-beerprofileroute');
							var route = $('span.variables').attr('data-addtocoolerajaxroute');
							var beerUrl = url.replace("xxxxx", data[i].id);
							var beerId = data[i].id;
							var beerIsInCooler = data[i].beerIsInCooler;

							if (data[i].filepath != '') {
								var photoUrl = data[i].filepath;
							} else {
								var photoUrl = 'delirium_tremens.png';
							};

							var beerTemplate = $('.beer.template');
							$(beerTemplate).clone().appendTo('ul#autocomplete');
							var beer = $('ul#autocomplete li.beer.template');

							beer.children('a').attr('href', beerUrl);
							beer.children('a').children('img').attr('src', '../img/beers/'+photoUrl);
							beer.children('a').children('h2').text(data[i].name);
							beer.children('a').children('p.teint').text(data[i].category);
							beer.children('a').children('p.alcohol').text(data[i].abv);
							beer.children('a').children('div.fridge').attr('id', beerId);

							if (beerIsInCooler == true) {
								beer.children('a').children('div.fridge').children('img').attr('src', '../img/frigovert.png');
							} else {
								beer.children('a').children('div.fridge').children('img').attr('src', '../img/frigogris.png');

							};

							beer.show('fast');
							beer.removeClass('template');

							var fridge = $('.beer').children('a').children('div.fridge#'+beerId);

							fridge.on('click', function(event) {
								event.preventDefault();
								var beerId = $(this).attr('id');
								var fridge = $('.beer').children('a').children('div.fridge#'+beerId);
								$.ajax({
									url: route,
									type: 'POST',
									contentType: "application/x-www-form-urlencoded;charset=UTF-8",
									data: {beerId : beerId},
									success: function  (data) {
										fridge.children('img').attr('src', '../img/frigovert.png');
									}
								})
							});
						};
					}
				})
			};
		});
	}
}
autocomplete.initialize();