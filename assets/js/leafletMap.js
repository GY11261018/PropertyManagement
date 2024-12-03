// Using leaflet.js to pan and zoom a big image.
var map = L.map('image-map', {
	minZoom: 0.1,
	maxZoom: 4,
	center: [0, 0],
	zoom: 1,
	maxBoundsViscosity: 1,
	crs: L.CRS.Simple
  
}).setView([0,0], 0.1)
//zoom 4 full size image is 4608px * 3456 px
//zoom 3 2304 * 1728
//zoom 2 1152 * 864
//zoom 1 576 * 432

var image= L.imageOverlay("../assets/image/Master Layout TIM.jpg", [[0,0], [432,576]]); //initial size at zoom 1 )

image.addTo(map);
// tell leaflet that the map is exactly as big as the image
map.setMaxBounds(new L.LatLngBounds([0,0], [432,576]));  // prevent panning outside the image area.
//Note the viscosity setting keeps the image from being dragged outside this 

marker = L.marker(map.getCenter(), {draggable:'true'}).addTo(map);

	marker.on('drag', function(event){
		var marker = event.target;
		var position = marker.getLatLng();
		
		sessionStorage.setItem("latitude", position.lat);
		sessionStorage.setItem("longitude", position.lng);
	});

$(document).ready(function(){
	
	map.attributionControl.setPrefix(false);
	
	if(!sessionStorage["latitude"])
	{
		var latlng = L.latLng(268, 286);
		marker.setLatLng(latlng);
		map.setView(latlng, 0.1);
	}
	else
	{
		var lat = sessionStorage.getItem("latitude"),
			lng = sessionStorage.getItem("longitude");
		
		var corner1 = L.latLng(0,0),
			corner2 = L.latLng(432,576),
			bounds = L.latLngBounds(corner1, corner2);
			
		marker.setLatLng(L.latLng(lat, lng));
		map.fitBounds(bounds);
		map.setView(L.latLng(lat, lng), 2);
	}
});
	