var map;
var service;
var infowindow;

function initialize() {
	
  var pos = getGeoLocation();
}
function appendBarCard (bar) {
	$('ul#barList').append('<li>'+bar.name+'</li>');
}
function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      console.log(results[i]);
      console.log(results[i].name);
      appendBarCard(results[i]);
    }
  }
}
function getGeoLocation () {
	if(navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	      var pos = new google.maps.LatLng(position.coords.latitude,
	                                       position.coords.longitude);

	      var request = {
	        location: pos,
	        radius: '3000',
	        types: ['bar']
	      };
	      var mapOptions = {
	          zoom: 6
	        };
	     map = new google.maps.Map(document.getElementById('map'),
	            mapOptions);
	      service = new google.maps.places.PlacesService(map);
	      service.nearbySearch(request, callback);

	    });
	  } else {
	  	console.log ('no position');
	  }
}

google.maps.event.addDomListener(window, 'load', initialize);