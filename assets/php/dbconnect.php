<?php

	global $conn;
	/*
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbname = "propertydb";
	*/
	$serverName = "localhost";
	$username = "";
	$password = "";
	 $dbname = "tj4_property";
	
	$conn = new mysqli($serverName, $username, $password, $dbname);
	
	if($conn->connect_error){
			die("Connection Failed: ". $conn->connect_error);
		
	}//if
	
?>
