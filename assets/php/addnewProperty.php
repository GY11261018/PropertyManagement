<?php 
	include('dbconnect.php');
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$response = "0";
	
		$name = $_POST['Property_Name'];
		$address = $_POST['Property_Address'];
		$details = $_POST['Property_Details'];
		$owner = $_POST['Property_Owner'];
		$type = $_POST['Property_Type'];
		$rentalprice = $_POST['Rental_Price'];
		$rentalstatus = $_POST['Rental_Status'];
		$mapid = $_POST['map_id'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];

		$sql = "INSERT INTO property(property_name, property_address, property_description, property_owner, property_type, rental_price, rental_status, map_id, latitude, longitude) 
		VALUES( '$name','$address', '$details', '$owner', '$type', '$rentalprice', '$rentalstatus', '$mapid', '$latitude', '$longitude')";
		  
		if(mysqli_query($conn, $sql)){		
			
			$response = "1";
	   }
	}
	
	echo json_encode($response);
	
?>