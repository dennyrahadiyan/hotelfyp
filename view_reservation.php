 <?php

include 'core/init.php';
protect_page();
include 'includes/overall/header.php' ;
?>


 <?php
 

// Store query in variable
$query = "SELECT * FROM reservation WHERE user_id = '$user_id'";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table border=1>\n";
  echo "<tr bgcolor=#dedede>\n";
    	echo "<td>Reservation ID</td>";
    	echo "<td>User ID</td>";
    	echo "<td>First Name</td>";
    	echo "<td>Last Name</td>";
		echo "<td>Check-in</td>";
		echo "<td>Date of Reservation</td>";
		echo "<td>Length of Stay</td>";
		
  echo "</tr>\n";
while ($row = mysql_fetch_assoc($result)) {
  echo "<tr>\n";
    	echo "<td>".$row['reservation_id']."</td>";
    	echo "<td>".$row['user_id']."</td>";
    	echo "<td>".$row['reservation_fname']."</td>";
		echo "<td>".$row['reservation_lname']."</td>";
		echo "<td>".$row['check_in']."</td>";
		echo "<td>".$row['dor']."</td>";
		echo "<td>".$row['dco']."</td>";

  echo "</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>