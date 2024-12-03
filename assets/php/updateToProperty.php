<?PHP
include ('dbconnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$response = "0";
	
	$id = $_POST['Property_ID'];
	$name = $_POST['Property_Name'];
	$address = $_POST['Property_Address'];
	$details = $_POST['Property_Details'];
	$owner = $_POST['Property_Owner'];
	$type = $_POST['Property_Type'];
	$rentalprice = $_POST['Rental_Price'];
	$rentalstatus = $_POST['Rental_Status'];
	$mapid = $_POST['map_id'];
	$latitude = $_POST['Latitude'];
	$longitude = $_POST['Longitude'];


	$sql = "UPDATE property SET property_name = '$name', property_address = '$address', property_description = '$details', property_owner = '$owner', property_type = '$type', 
			rental_price = '$rentalprice', rental_status = '$rentalstatus', map_id = '$mapid', latitude = '$latitude', longitude = '$longitude' WHERE property_id = $id ";
	
	if(mysqli_query($conn, $sql)){		
		$response = "1";	
	}
}

echo json_encode($response);

?>
