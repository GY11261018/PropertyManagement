<?PHP
include ('dbconnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$response = "0";

	$id = $_POST['map_id'];
	$name = $_POST['map_name'];
	$img = $_POST['map_image'];

	if($img == "")
	{
		$sql = "UPDATE map SET map_name = '$name' WHERE map_id = $id ";
	}
	else
	{
		$sql = "UPDATE map SET map_name = '$name', map_image = '$img' WHERE map_id = $id ";
	}
	
	if(mysqli_query($conn, $sql)){
		$response = "1";
	}

}

echo json_encode($response);


?>
