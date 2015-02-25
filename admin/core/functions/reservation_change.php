<?php
include '../init.php';
include '../../includes/overall/header.php';

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query="UPDATE reservation
	SET fullname = '".$_POST['fullname']."',
		contactno = '".$_POST['contactno']."',
		passport = '".$_POST['passport']."',
		roomtype = '".$_POST['roomtype']."',
		num_of_rooms = '".$_POST['num_of_rooms']."',
		dor = '".$_POST['dor']."',
		dco = '".$_POST['dco']."'
	
	WHERE reservation_id = '".$_POST['reservation_id']."'
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo "You have been successfully change your reservation!";

// Closing connection
mysql_close($link);


?>