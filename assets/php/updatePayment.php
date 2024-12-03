<?PHP
	include ('dbconnect.php');
	//include ('session.php');
	
	// Update Payment Details
	if(isset($_POST["edit"])) {
		
		$editID = $_POST['edit'];

		$sql = "SELECT * FROM property JOIN payment WHERE payment.payment_id = $editID AND property.property_id = payment.property_id";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		
		$payment = 
		array(
			"payment_id" => $data["payment_id"],
			"property_name" => $data["property_name"],
			"client_name" => $data["client_name"],
			"electricity_bill" => $data["electricity_bill"],
			"water_bill" => $data["water_bill"],
			"rental_price" => $data["rental_price"],
			"payment_status" => $data["payment_status"],
			"total_amount" => $data["total_amount"]
		);
		

		$sql2 = "SELECT * FROM property WHERE visibility='1'";
		
		$result2 = $conn->query($sql2);
		
		$property = array();
		$propertyIndex = 0;
		
		if ($result2->num_rows>0){
			while ($row2 = $result2->fetch_assoc()){
				
				$propertyList = 
				array(
					"property_name" => $row2["property_name"]
				);
				
				$property[$propertyIndex] = $propertyList;
				$propertyIndex++;
			}
		}
		
		echo json_encode(array("payment" => $payment, "property" => $property));
	}
	
	// Delete Payment
	if(isset($_POST["payment_id"])) {
		$id = $_POST["payment_id"];
		
		$sql = "UPDATE payment SET visibility = '0' WHERE payment_id = '$id' ";
		
		if(mysqli_query($conn, $sql)){		
			echo json_encode("paymentList.html");		
		}
	}
?>