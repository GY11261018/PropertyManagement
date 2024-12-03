// Check for form validation
$("#form").on('submit', function(e){
	e.preventDefault();
	
	let id = document.form.admin_id.value;
	let pic = document.form.Profile_Picture.value;
	let fname = document.form.fullname.value;
	let bday = document.form.birth.value;
	let sex = document.form.gender.value;
	let pnum = document.form.phone.value;
	let mail = document.form.email.value;
	let pass = document.form.pw.value;
	
	if(fname == "" || bday == "" || sex == "" || pnum == "" || mail == "" || pass == "")
	{
		$("#myModal").modal('show');
	}
	else {
	
		var formdata = 'admin_id=' + id + '&Profile_Picture=' + pic + '&fullname=' + fname + '&birth=' + bday + '&gender=' + sex + '&phone=' + pnum
						+ '&email=' + mail + '&pw=' + pass;

		$.ajax({
			type: 'POST',
			url: '../assets/php/updateProfile.php',
			data: formdata,
			dataType: 'json',
			success: function (response) {
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