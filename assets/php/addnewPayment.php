<?php 
	include('dbconnect.php');
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$response = "0";
	
		$name = $_POST['Property_Name'];
		$cname = $_POST['Client_Name'];
		$ebill = $_POST['Electricity_Bill'];
		$wbill = $_POST['Water_Bill'];
		$status = $_POST['Payment_Status'];

		$sql = "SELECT * FROM property WHERE property_name = '$name'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		
		$propertyID = $data['property_id'];
		$total = $ebill + $wbill + $data['rental_price'];
		
		$sql1 = "INSERT INTO payment(property_id, client_name, electricity_bill, water_bill, total_amount, payment_status) 
		VALUES( '$propertyID','$cname', '$ebill', '$wbill', '$total', '$status')";
	  
		if(mysqli_query($conn, $sql1)){		
			
			$response = "1";
		}	
	}
	
	echo json_encode($response);
?>