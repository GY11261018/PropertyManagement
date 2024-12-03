<?php 
	//include('session.php');
	include('dbconnect.php');
	

		if(isset($_POST["Profile_Picture"]) && isset($_POST["fullname"]) && isset($_POST["birth"]) && isset($_POST["gender"]) 
            && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["pw"])){
			
			$response = "0";
			
			$id = $_POST["admin_id"];
			$picture = $_POST["Profile_Picture"];
			$fullname = $_POST["fullname"];
			$birth = $_POST["birth"];
			$gender = $_POST["gender"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$password = $_POST["pw"];
			
			// Update picture only if the user upload new profile picture
			if($picture != "")
			{
				$sql = "UPDATE admin SET admin_fullname = '$fullname', admin_birth = '$birth', admin_gender = '$gender',
				admin_phone = '$phone', admin_email = '$email', admin_password = '$password', profile_picture = '$picture' WHERE admin_id = '$id' ";
			} else {
				$sql = "UPDATE admin SET admin_fullname = '$fullname', admin_birth = '$birth', admin_gender = '$gender',
				admin_phone = '$phone', admin_email = '$email', admin_password = '$password' WHERE admin_id = '$id' ";
			}
		
			if(mysqli_query($conn, $sql)){
				$response = "1";
			}
		
		}
		
		echo json_encode($response);
	

?>