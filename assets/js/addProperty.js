/******** Leaflet Map ********/

$(document).ready(function(){
	
	map.attributionControl.setPrefix(false);
	
	let lat = document.form.Latitude.value;
	let lng = document.form.Longitude.value;

	if(lat == 0 && lng == 0)
	{
		var latlng = L.latLng(268, 286);
		marker.setLatLng(latlng);
		map.setView(latlng, 0.1);
	}
	else
	{
		var corner1 = L.latLng(0,0),
			corner2 = L.latLng(432,576),
			bounds = L.latLngBounds(corner1, corner2);
			
		marker.setLatLng(L.latLng(lat, lng));
		map.fitBounds(bounds);
		map.setView(L.latLng(lat, lng), 2);
	}
});

var map = L.map('image-map', {
	minZoom: 0.1,
	maxZoom: 4,
	center: [0, 0],
	zoom: 1,
	maxBoundsViscosity: 1,
	crs: L.CRS.Simple
  
}).setView([0,0], 0.1)

var image= L.imageOverlay("../assets/image/Master Layout TIM.jpg", [[0,0], [432,576]]); //initial size at zoom 1 )

image.addTo(map);

map.setMaxBounds(new L.LatLngBounds([0,0], [432,576]));

marker = L.marker(map.getCenter(), {draggable:'true'}).addTo(map);

marker.on('drag', function(event){
	
	let lat = document.form.Latitude.value;
	let lng = document.form.Longitude.value;

	var marker = event.target;
	var position = marker.getLatLng();
	
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng);
});

// Latitude - User input
$("#Latitude").on('input', function(){
	let lat = $("#Latitude").val();
	let lng = $("#Longitude").val();
	
	var corner1 = L.latLng(0,0),
		corner2 = L.latLng(432,576),
		bounds = L.latLngBounds(corner1, corner2);
		latlng = L.latLng(lat, lng)
			
	marker.setLatLng(latlng);
	map.fitBounds(bounds);
	map.setView(latlng, 2);
});

// Longitude - User input
$("#Longitude").on('input', function(){
	let lat = $("#Latitude").val();
	let lng = $("#Longitude").val();
	
	var corner1 = L.latLng(0,0),
		corner2 = L.latLng(432,576),
		bounds = L.latLngBounds(corner1, corner2);
		latlng = L.latLng(lat, lng)
			
	marker.setLatLng(latlng);
	map.fitBounds(bounds);
	map.setView(latlng, 2);
});


/******** Form Submission ********/

$("#form").on('submit', function(e){
		
	e.preventDefault();

	let name = document.form.Property_Name.value;
	let address = document.form.Property_Address.value;
	let description = document.form.Property_Details.value;
	let owner = document.form.Property_Owner.value;
	let type = document.form.Property_Type.value;
	let price = document.form.Rental_Price.value;
	let status = document.form.Rental_Status.value;
	let map = document.form.map_id.value;
	let lat = document.form.Latitude.value;
	let lng = document.form.Longitude.value;
	
	if(name == "" || address == "" || description == "" || owner == "" || type == "" || price == "" || status == "")
	{
		$("#myModal").modal('show');
	} 
	else {
	
		var formdata = 'Property_Name=' + name + '&Property_Address=' + address + '&Property_Details=' + description + '&Property_Owner=' + owner + '&Property_Type=' + type 
						+ '&Rental_Price=' + price + '&Rental_Status=' + status + '&map_id=' + map + '&latitude=' + lat + '&longitude=' + lng;
		
		$.ajax({
			type: 'POST',
			url: '../assets/php/addnewProperty.php',
			data: formdata,
			dataType: 'json',
			success: function(response) {
			
				if(response == "1")
				{
					$("#successModal").modal('show');
				} 
				else {
					$("#failModal").modal('show');
				}
			
			}
		});
	}
});