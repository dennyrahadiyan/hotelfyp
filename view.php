<?php

include 'core/init.php';

include 'includes/overall/header.php' ; 

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query = "SELECT reservation_id FROM reservation ORDER BY reservation_id DESC LIMIT 1";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


    	echo "<td><h1> Your Reservation Number is ";

		
  echo "</tr>\n";
while ($row = mysql_fetch_assoc($result)) {
  echo "<tr>\n";
    	echo "<td>".$row['reservation_id']."</td></h1>Please write down your number before go back!!!";

		
  echo "</tr>\n";
  }


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
  ?>