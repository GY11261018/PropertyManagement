<?php 
	//include ('session.php');
	include ('dbconnect.php');
	
	$id = $_POST['id'];
	$sql = "SELECT * FROM admin WHERE admin_id = $id ";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$profile = 
	array(
		"admin_id" => $data["admin_id"],
		"profile_picture" => $data["profile_picture"], 
		"admin_username" => $data["admin_username"], 
		"admin_fullname" => $data["admin_fullname"], 
		"admin_birth" => $data["admin_birth"],
		"admin_gender" => $data["admin_gender"], 
		"admin_phone" => $data["admin_phone"], 
		"admin_email" => $data["admin_email"], 
		"admin_password" => $data["admin_password"] 
	);
	
	
	echo json_encode($profile);

?>