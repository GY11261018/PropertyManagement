<?php 

	include 'dbconnect.php';
	
	$id = $_POST["mapID"];
	
	$sql = "SELECT map_image FROM map where map.map_id = $id";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$map_image = $data["map_image"];
	
	echo json_encode($map_image);
	
?>