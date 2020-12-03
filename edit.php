<?php 
	$data1 = $_POST['bookingIDs'];
	$data2 = $_POST['Data'];
	$data3 = $_POST['newData'];




	

	$host ="localhost";
	$dbUsername= "root";
	$dbPassword = "";
	$dbname = "trkonlinebooking";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	$result = $conn->query("SELECT booking_id FROM booking");



	if($data2 === "Date" ){
		$sql = "UPDATE booking SET date_of_event = '".$data3."' Where booking_id = '".$data1."' ";
	} else if($data2 === "Time" ){
		$sql = "UPDATE booking SET time_of_event = '".$data3."' Where booking_id = '".$data1."' ";
	} else if($data2 === "Venue" ){
		$sql = "UPDATE booking SET venue = '".$data3."' Where booking_id = '".$data1."' ";
	} else if($data2 === "Phone" ){
		$sql = "UPDATE booking SET tel = '".$data3."' Where booking_id = '".$data1."' ";
	} else if($data2 === "Email" ){
		$sql = "UPDATE booking SET email = '".$data3."' Where booking_id = '".$data1."' ";
	}else if($data2 === "Equipment" ){
		$sql = "UPDATE booking SET equipment_id = '".$data3."' Where booking_id = '".$data1."' ";
	}

	
	if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
<!--  -->

<!--
Display all item in post
echo "<pre>"; print_r($_POST) ;  echo "</pre>";
-->