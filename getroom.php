<?php

include 'core/init.php';
protect_page();
include 'includes/overall/header.php' ;


	
if (ISSET($_GET['reservation_id'])) {
	
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
	mysql_select_db('hotel_reservation5') or die('Could not select database');

	$query="SELECT *
		FROM reservation
		WHERE reservation_id = '".$_GET['reservation_id']."'
		";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($row = mysql_fetch_assoc($result)) {
		$reservation_id=$row['reservation_id'];
		$fullname=$row['fullname'];
		$contactno=$row['contactno'];
		$passport=$row['passport'];
        $roomtype=$row['roomtype'];
		$num_of_rooms=$row['num_of_rooms'];
		$dor=$row['dor'];
		$dco=$row['dco'];
		$room_num=$row['room_num'];
		
	}
}
else {
	$fullname="";
	$contactno="";
	$passport="";
	$roomtype="";
	$num_of_rooms="";
	$dor="";
	$dco="";
	$room_num='';

}

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';
	
// Update room number on reservation table
$query="UPDATE reservation SET room_num = 
	(
	SELECT
    room.room_num
FROM
    room
WHERE
  roomtype = '$roomtype' AND
  room.room_num not in 
  (
    SELECT
      room_booked.room_num
    FROM
      room_booked
    WHERE
      (room_booked.dor<='$dor' and room_booked.dco>='$dor')
      OR
      (room_booked.dor<'$dco' and room_booked.dco>='$dco')
      OR
      (room_booked.dor>='$dor' and room_booked.dco<'$dco')
   )
ORDER BY
    RAND()
LIMIT 0, 1

	)
	WHERE roomtype = '$roomtype' AND reservation_id = $reservation_id
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


// Closing connection
mysql_close($link);

header("Location:roomupdated.php?reservation_id=".$reservation_id."");

?>