<?php 

	include 'dbconnect.php';

	$sql = "SELECT * FROM property JOIN payment where property.property_id = payment.property_id AND payment.visibility = '1'";

	$result = $conn->query($sql);
	
	$payment = array();
	$paymentIndex = 0;
	
	if ($result->num_rows>0){
		
		while ($row = $result->fetch_assoc()){ 
		//$total = $row["electricity_bill"] + $row["water_bill"] + $row["rental_price"];
			$paymentList = 
			array(
				"payment_id" => $row["payment_id"],
				"property_name" => $row["property_name"],
				"client_name" => $row["client_name"],
				"rental_price" => $row["rental_price"],
				"total_amount" => $row["total_amount"],
				"payment_status" => $row["payment_status"]
			);
			
			$payment[$paymentIndex] = $paymentList;
			$paymentIndex++;
		}
	}
	
	echo json_encode($payment);
	
?>