<?php
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

$id=$_GET['reservation_id'];

// Store query in variable
$query = "DELETE FROM reservation WHERE reservation_id = $id";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Closing connection
mysql_close($link);

header("Location: reservation_mgmt.php");
?>