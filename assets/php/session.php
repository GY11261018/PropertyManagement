<?php

include('dbconnect.php');

if (!session_id()){
  session_start();
}

	$username = $_SESSION['admin_username'];
	$ses_sql=mysqli_query($conn,"select * from admin where admin_username='$username'");

	$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	$loggedin_session=$row['admin_username'];
	$loggedin_id=$row['admin_id'];

	$_SESSION['admin_username']=$loggedin_session;
	$_SESSION['admin_id']= $loggedin_id;

	if(!isset($loggedin_session) || $loggedin_session == NULL) {
		//echo"<script>alert('Not authorise')</script>";
		$response = "0";
	} 
	else {
		$response = "1";
	}

	echo json_encode(array("response" => $response, "id" => $loggedin_id));

?>