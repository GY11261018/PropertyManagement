<?php 

	include 'dbconnect.php';

	$sql = "SELECT * FROM map where map.visibility = '1'";

	$result = $conn->query($sql);
	
	$map = array();
	$mapIndex = 0;
	
	if ($result->num_rows>0){
		
		while ($row = $result->fetch_assoc()){ 
		
			$mapList = 
			array(
				"map_id" => $row["map_id"],
				"map_name" => $row["map_name"],
				"map_image" => $row["map_image"]
			);
			
			$map[$mapIndex] = $mapList;
			$mapIndex++;
		}
	}
	
	echo json_encode($map);
	
?>