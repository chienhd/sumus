function initMap() {
  var here = {lat: 35.027254, lng: 135.974418};
  var map = new google.maps.Map(document.getElementById('google-maps'), {
    zoom: 15,
  center: here,
  styles: []
});
  
  var iconBase = {
		url: '/owner/wp-content/themes/main/images/map-pin@2x.png',
		size: new google.maps.Size(27,45),
		origin: new google.maps.Point(0,0),
		//anchor: new google.maps.Point(13,42),
		scaledSize: new google.maps.Size(27,45)
  };

  var marker = new google.maps.Marker({
    position: here,
    map: map,
    icon: iconBase
  });
}