<?php 

	include 'dbconnect.php';

	$sql = "SELECT * FROM property WHERE visibility = '1' ";

	$result = $conn->query($sql);
	
	$property = array();
	$propertyIndex = 0;
	
	if ($result->num_rows>0){
		while ($row = $result->fetch_assoc()){ 
			$propertyList =
			array(
				"property_id" => $row["property_id"],
				"property_name" => $row["property_name"],
				"property_owner" => $row["property_owner"],
				"property_type" => $row["property_type"],
				"rental_price" => $row["rental_price"],
				"rental_status" => $row["rental_status"]
			);
			
			$property[$propertyIndex] = $propertyList;
			$propertyIndex++;
		}
	}
	
	echo json_encode($property);
?>