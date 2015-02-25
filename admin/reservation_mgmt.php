<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}

?>
<?php
include 'core/functions/users.php';	 
include 'includes/overall/header_admin.php' ;

// Connecting, selecting database
$link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error());
//echo 'Connected successfully<br>';
mysqli_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query = "SELECT * FROM reservation ORDER BY reservation_id";

// Performing SQL query
$result = mysqli_query($query) or die('Query failed: ' . mysqli_error());

// Printing results in HTML

echo "<table border=0>\n";
  echo "<tr bgcolor=#A9D0F5>\n";
    	echo "<td>Reservation Number</td>";
    	echo "<td>Full Name</td>";
    	echo "<td>Contact</td>";
    	echo "<td>Passport</td>";
		echo "<td>Room Type</td>";
		echo "<td>Check-in Date</td>";
		echo "<td>Check-out Date</td>";
		echo "<td>Action</td>";
		
		
  echo "</tr>\n";
while ($row = mysql_fetch_assoc($result)) {
  echo "<tr>\n";
    	echo "<td>".$row['reservation_id']."</td>";
    	echo "<td>".$row['fullname']."</td>";
    	echo "<td>".$row['contactno']."</td>";
		echo "<td>".$row['passport']."</td>";
		echo "<td>".$row['roomtype']."</td>";
		echo "<td>".$row['dor']."</td>";
		echo "<td>".$row['dco']."</td>";
		echo "<td><a href='delete.php?reservation_id=".$row['reservation_id']."'>Delete</a></td>\n";
		
  echo "</tr>\n";
}
echo "</table>\n";


// Free resultset
mysqli_free_result($result);

// Closing connection
mysqli_close($link);
?>
      </p>
<p><p><a href="../admin.php">Go back</a></p></p></td>
  </tr>
</table>
