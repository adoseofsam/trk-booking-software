<!DOCTYPE html>
<html>

<head>
<title>View Booking</title>
<link rel="stylesheet" href="viewbooking.css"> 
<script type="text/javascript" src="viewbooking.js"></script>
</head>

<body>

  <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for Booking" title="Type a Booking Name"> 

  <table id="bookingInfo">

    <tr class="header">
        <th>Event</th>
        <th>Client</th>
        <th>Venue</th>
        <th>Date</th>
        <th>Time</th>
        <th>Equipment</th>
    </tr>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookdb";

     
        $conn = new mysqli($servername, $username, $password, $dbname);
            
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Event, Client, Venue, Date, Time, Equipment FROM testdata ORDER BY Event ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $row["Event"]. "</td><td>" . $row["Client"]. "</td><td>" . $row["Venue"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["Time"]. "</td><td>" . $row["Equipment"]. "</td></tr>";
            }
            echo "</table>";
            } else {
            echo "0 results";
            }

        $conn->close();
        ?>



  </table>
           

</body>

</html>


