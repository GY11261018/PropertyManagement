<?php

include "dbconnect.php";

if( isset($_POST['username']) && isset($_POST['password']) ){
	
	$response = "0";
		
	$name = $_POST['username'];
	$pw= $_POST['password'];
	$sql = "SELECT * FROM admin WHERE admin_username = '$name' and admin_password = '$pw'";
	$result = $conn->query($sql);

	if (mysqli_num_rows($result) === 1) {
		
		session_start();

		 $_SESSION['admin_username'] = $name;
		 $_SESSION['admin_password'] = $pw;
		
		$response = "1";
	}
}	

echo json_encode($response);


?>




