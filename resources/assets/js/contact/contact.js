$(function() {
	if ($( "body" ).hasClass( "contactPage" )) {
	   	var map;
	   	var Lat = parseFloat($('.mapContact').attr('data-lat'));
	   	var Lon = parseFloat($('.mapContact').attr('data-lon'));
	   	initMap();
		function initMap() {
			console.log(Lon);
		  map = new google.maps.Map(document.getElementById("map"), {
		    center: { lat: Lat, lng: Lon },
		    zoom: 12
		  });

		  var marker = new google.maps.Marker({
		    position: { lat: Lat, lng: Lon },
		    map: map,
		  });
		}
	}
});