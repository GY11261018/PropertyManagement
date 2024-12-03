$("#form").on('submit', function(e){
	
	e.preventDefault();

	let name = document.form.map_name.value;
	let img = document.form.map_image.value;
	
	if(name == "" || img == "" )
	{
		$("#myModal").modal('show');
	} 
	else {
	
		var formdata = 'map_name=' + name + '&map_image=' + img;
		
		$.ajax({
			type: 'POST',
			url: '../assets/php/addnewMap.php',
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