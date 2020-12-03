<?php 
	$host ="localhost";
	$dbUsername= "root";
	$dbPassword = "";
	$dbname = "trkonlinebooking";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	$result = $conn->query("SELECT booking_id FROM booking");

?>




<!DOCTYPE html>
<html>
<head>
	<h1> Edit Booking </h1>
	<script type="text/javascript" src="valid.js"></script>
	<title>Edit Booking</title>

</head>
<body>

	
	<form action="edit.php" method="POST" target="edit.php" onsubmit="return validator()">
		Booking ID:

	<select name="bookingIDs">
		<option value=""></option>
	<?php 
		
		while ($row = $result->fetch_assoc()){
			$field1name = $row['booking_id'];
		echo "<option value=" . $row['booking_id'] .">" . $row['booking_id'] . "</option>";
		
		}
		echo "<tr>
				<td>".$field1name."</td>
				</tr>";
	?>
	</select>		
			


		<label for="Data">What are you changing?:</label>
	  		<select name="Data" id="Data" onclick="validator()">
	  		<option value="Phone">Phone</option>
	    	<option value="Date">Date</option>
	    	<option value="Time">Time</option>
	    	<option value="Venue">Venue</option>
	    	<option value="Email">Email</option>
	    	<option value="Equipment">Equipment</option>
	  		</select>
	  		Enter Change: <input type="text" name="newData" size="40">
	  		<input type="submit" value="submit">


	</form>
<?php 
	$query = "SELECT * FROM booking";


	
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Booking IDs</font> </td> 
          <td> <font face="Arial">Customer IDs</font> </td> 
          <td> <font face="Arial">Customer Fname</font> </td> 
          <td> <font face="Arial">Customer Lname</font> </td> 
          <td> <font face="Arial">Employee IDs</font> </td> 
          <td> <font face="Arial">Equipment IDs</font> </td> 
          <td> <font face="Arial">Venue</font> </td> 
          <td> <font face="Arial">Date of Event</font> </td> 
          <td> <font face="Arial">Time of Event</font> </td> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {

    	$query2 = "SELECT first_name,last_name FROM customer where customer_id= '". $row['customer_id'] ."'";
    	$row2 = $conn->query($query2)->fetch_assoc();
    	
    	
        $field1name = $row["booking_id"];
        $field2name = $row["customer_id"];

        $field8name = $row2["first_name"];
        $field9name = $row2["last_name"];

        $field3name = $row["employee_id"];
        $field4name = $row["equipment_id"];
        $field5name = $row["venue"]; 
        $field6name = $row["date_of_event"];
        $field7name = $row["time_of_event"];

        echo '<tr> 
                  <td style="text-align:center;">'.$field1name.'</td> 
                  <td style="text-align:center;">'.$field2name.'</td> 

				  <td style="text-align:center;">'.$field8name.'</td> 
                  <td style="text-align:center;">'.$field9name.'</td> 

                  <td style="text-align:center;">'.$field3name.'</td> 
                  <td style="text-align:center;">'.$field4name.'</td> 
                  <td style="text-align:center;">'.$field5name.'</td>
                  <td style="text-align:center;">'.$field6name.'</td>
                  <td style="text-align:center;">'.$field7name.'</td>
              </tr>';
    }
    $result->free();
}
?> 
</body>
</html>