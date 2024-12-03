<?PHP
	include ('dbconnect.php');
	
	if (isset($_POST['edit'])) 
	{
		$edit = $_POST["edit"];
		
		$sql = "SELECT * FROM property JOIN map WHERE property_id =  $edit AND map.map_id = property.map_id";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		
		$property =
		array(
			"property_id" => $data["property_id"],
			"property_name" => $data["property_name"],
			"property_address" => $data["property_address"],
			"property_description" => $data["property_description"],
			"property_owner" => $data["property_owner"],
			"property_type" => $data["property_type"],
			"rental_price" => $data["rental_price"],
			"rental_status" => $data["rental_status"],
			"map_image" => $data["map_image"],
			"latitude" => $data["latitude"],
			"longitude" => $data["longitude"],
		);
		
		echo json_encode($property);
	}
	
	if (isset($_POST['property_id'])) 
	{
		$id = $_POST['property_id'];
		
		$sql = "UPDATE property SET visibility = '0' WHERE property_id = '$id' ";
		
		if(mysqli_query($conn, $sql)){		
			echo json_encode("propertyList.html");		
		}
	}
?>