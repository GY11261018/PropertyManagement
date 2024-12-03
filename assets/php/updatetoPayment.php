<?PHP
include ('dbconnect.php');
//include ('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$response = "0";

	$id = $_POST['Payment_ID'];
	$name = $_POST['Property_Name'];
	$cname = $_POST['Client_Name'];
	$ebill = $_POST['Electricity_Bill'];
	$wbill = $_POST['Water_Bill'];
	$status = $_POST['Payment_Status'];


	$sql = "SELECT * FROM property WHERE property_name = '$name'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$propertyID = $data['property_id'];
	$total = $ebill + $wbill + $data['rental_price'];

	$sql1 = "UPDATE payment SET property_id = '$propertyID', client_name = '$cname', electricity_bill = '$ebill', water_bill = '$wbill', total_amount = '$total', payment_status = '$status'
		WHERE payment_id = $id ";
	
	if(mysqli_query($conn, $sql1)){		
		$response = "1";
	}
	
	echo json_encode(array('response' => $response, 'rental_price' => $data['rental_price'], 'total_amount' => $total ));
}


?>
