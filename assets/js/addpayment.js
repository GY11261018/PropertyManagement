$("#form").on('submit', function(e){
	
	e.preventDefault();

	let name = document.form.Property_Name.value;
	let cname = document.form.Client_Name.value;
	let ebill = document.form.Electricity_Bill.value;
	let wbill = document.form.Water_Bill.value;
	let status = document.form.Payment_Status.value;
	
	if(name == "" || cname == "" || ebill == "" || wbill == "" || status == "")
	{
		$("#myModal").modal('show');
	} 
	else {
	
		var formdata = 'Property_Name=' + name + '&Client_Name=' + cname + '&Electricity_Bill=' + ebill + '&Water_Bill=' + wbill + '&Payment_Status=' + status;
		
		$.ajax({
			type: 'POST',
			url: '../assets/php/addnewPayment.php',
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