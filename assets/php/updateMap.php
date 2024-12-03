<?PHP
	include ('dbconnect.php');
	
	// Update Map Details
	if(isset($_POST["edit"])) {
		
		$editID = $_POST['edit'];

		$sql = "SELECT * FROM map WHERE map_id = $editID";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		
		$map = 
		array(
			"map_id" => $data["map_id"],
			"map_name" => $data["map_name"],
			"map_image" => $data["map_image"]
		);
		
		echo json_encode(array("map" => $map));
	}
	
	// Delete Map
	if(isset($_POST["map_id"])) {
		$id = $_POST["map_id"];
		
		$sql = "UPDATE map SET visibility = '0' WHERE map_id = '$id' ";
		
		if(mysqli_query($conn, $sql)){		
			echo json_encode("mapList.html");		
		}
	}
?>