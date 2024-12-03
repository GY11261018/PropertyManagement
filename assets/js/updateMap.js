$("#form").on('submit', function(e){
		
	e.preventDefault();
	
	let id = document.form.map_id.value;
	let name = document.form.map_name.value;
	let img = document.form.map_image.value;
	
	if(name == "")
	{
		$("#myModal").modal('show');
	} 
	else {
	
		var formdata = 'map_id=' + id + '&map_name=' + name + '&map_image=' + img;
		
		$.ajax({
			type: 'POST',
			url: '../assets/php/updatetoMap.php',
			data: formdata,
			dataType: 'json',
			success: function(data) {
			
				if(data == "1")
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