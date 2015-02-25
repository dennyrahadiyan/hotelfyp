<?php
if (ISSET($_GET['reservation_id'])) {
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
	mysql_select_db('hotel_reservation5') or die('Could not select database');

	$query="SELECT *
		FROM confirmed_payment
		WHERE reservation_id = '".$_GET['reservation_id']."'
		";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($row = mysql_fetch_assoc($result)) {
		$reservation_id=$row['reservation_id'];

	}
}
else {
	$reservation_id="";

}

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query="UPDATE reservation 
	SET status = 'Checked-in'
	
	WHERE reservation_id = $reservation_id
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//echo "Success inserting record!";

// Closing connection
mysql_close($link);

echo "Room";
?>