<?php 

	include ('dbconnect.php');

	$sql = "SELECT * FROM property WHERE visibility = '1' ";
	
	$result = $conn->query($sql);
	
	$property = array();
	$propertyIndex = 0;
	
	if ($result->num_rows>0){
		while ($row = $result->fetch_assoc()){ 
			$propertyName =
			array(
				"property_name" => $row["property_name"]
			);
			
			$property[$propertyIndex] = $propertyName;
			$propertyIndex++;
		}
	}
	
	echo json_encode($property);
?>