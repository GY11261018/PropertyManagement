<?php 
	include('dbconnect.php');
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$response = "0";
	
		$name = $_POST['map_name'];
		$img = $_POST['map_image'];
		
		$sql = "INSERT INTO map(map_name, map_image) VALUES('$name', '$img')";
	  
		if(mysqli_query($conn, $sql)){	
			$response = "1";
		}	
	}
	
	echo json_encode($response);
?>