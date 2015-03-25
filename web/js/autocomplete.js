var autocomplete = {
	initialize: function () {
		var input = $('input#addabeer');
		input.on('keyup', function(event) {
			event.preventDefault();
			var term = input.val();
			$('ul#autocomplete').empty();
			if (term.length >= 2) {
				var autocompleteRoute = input.attr('data-autocompleteroute');;
				// console.log(term);
				
				$.ajax({
					url: autocompleteRoute,
					type: 'POST',
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					data: {term : term},
					success: function  (data) {
						for (var i = 0; i < data.length; i++) {
							// console.log(data[i].name);
							var url = $('span.variables').attr('data-beerprofileroute');
							var beerUrl = url.replace("xxxxx", data[i].id);
							console.log(data[i].filepath);
							if (data[i].filepath != '') {
								var photoUrl = data[i].filepath;
							} else {
								var photoUrl = 'delirium_tremens.png';
							};
							
							$('ul#autocomplete').append('<li><a href="'+beerUrl+'" ><div class="fridge"><img src="../img/fridge.png" alt="" /></div><img src="../img/beers/'+photoUrl+'" alt="" /><h2>'+data[i].name+'</h2><p class="teint" >'+data[i].category+'</p><p class="alcohol" >'+data[i].abv+'</p></a></li>');
						};
					}
				})
			};
		});
	}
}
autocomplete.initialize();