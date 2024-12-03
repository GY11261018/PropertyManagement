<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
	$test = explode('.', $_FILES["file"]["name"]);
	$ext = end($test);
	$name = rand(100, 999) . '.' . $ext;
	$moveLocation = '../uploadImage/' . $name;
	$location = '../assets/uploadImage/' . $name;  
	move_uploaded_file($_FILES["file"]["tmp_name"], $moveLocation);
	echo $location;
}
?>