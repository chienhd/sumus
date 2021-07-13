/* =======================================

	gmap.js
	
========================================== */

/* google map v3
---------------------------------------- */

function initialize() {

	var latlng = new google.maps.LatLng(35.0784517987712, 136.2513079324017);

	var myOptions = {
	zoom: 12,
	scrollwheel: false,
	panControlOptions:     { position: google.maps.ControlPosition.TOP_RIGHT },
	zoomControlOptions:    { position: google.maps.ControlPosition.TOP_RIGHT },
	mapTypeControlOptions: { position: google.maps.ControlPosition.TOP_CENTER },
	center: latlng,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	styles: [{
		stylers: [
			//{saturation: -100} 逋ｽ鮟�
			//{hue: "#000000"}, //繧ｫ繝ｩ繝ｼ繧ｳ繝ｼ繝�
			//{ gamma: 1.50}, //繧ｬ繝ｳ繝槫､
		]}
	]
	};

	var gmap = new google.maps.Map(document.getElementById("map_canvas"),
		myOptions);

	var marker = new google.maps.Marker({
		position: latlng,
		map: gmap,
		title: ''
	});
}

google.maps.event.addDomListener(window, 'load', initialize);