<?php
	include ('dbconnect.php');
	
	// Total number of property
	$sql = "SELECT COUNT(*) AS total_property FROM property WHERE visibility = '1'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$propertyCount = $data['total_property'];
	
	
	// Total number of payment
	$sql2 = "SELECT COUNT(*) AS total_payment FROM payment WHERE visibility = '1'";
	$result2 = mysqli_query($conn, $sql2);
	$data2 = mysqli_fetch_assoc($result2);
	
	$paymentCount = $data2['total_payment'];
	
	
	// Total Sales 
	$sql3 = "SELECT SUM(total_amount) AS total_sales FROM payment WHERE visibility = '1'";
	$result3 = mysqli_query($conn, $sql3);
	$data3 = mysqli_fetch_assoc($result3);
	
	$salesCount = $data3['total_sales'];
	
	
	// Latest 10 property data
	$property = array();
	$propertyIndex = 0;
	
	$sql4 = "SELECT * FROM property WHERE visibility = '1' ORDER BY property_id DESC LIMIT 10";
		
	$result4 = $conn->query($sql4);
	
	if($result4->num_rows>0){
		
		while ($row4 = $result4->fetch_assoc()){
			
				$propertyList = 
				array(
					"property_id" => $row4['property_id'],
					"property_name" => $row4['property_name'],
					"property_owner" => $row4['property_owner'],
					"property_type" => $row4['property_type'],
					"rental_status" => $row4['rental_status']
				);
 
				$property[$propertyIndex] = $propertyList;
				
				$propertyIndex++;
		}
		
	}
	
	
	// Latest 10 payment data
	$payment = array();
	$paymentIndex = 0;
	
	$sql5 = "SELECT * FROM property JOIN payment WHERE payment.visibility = '1' AND property.property_id = payment.property_id ORDER BY payment.payment_id DESC LIMIT 10";
		
	$result5 = $conn->query($sql5);
	
	if($result5->num_rows>0){
		
		while ($row5 = $result5->fetch_assoc()){
		
			$total = $row5["electricity_bill"] + $row5["water_bill"] + $row5["rental_price"]; 
			
			$paymentList = 
			array(
				"payment_id" => $row5['payment_id'],
				"property_name" => $row5['property_name'],
				"client_name" => $row5['client_name'],
				"total" => $total,
				"payment_status" => $row5['payment_status']
			);
			
			$payment[$paymentIndex] = $paymentList;
			$paymentIndex++;
		
		} 
	} 
	
	echo json_encode(array("total_property"=>$propertyCount, "total_payment"=>$paymentCount, "total_sales"=>$salesCount, "property"=>$property, "payment"=>$payment));

?>