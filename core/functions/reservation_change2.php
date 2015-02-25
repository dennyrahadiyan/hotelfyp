<?php
include '../init.php';
include '../../includes/overall/header.php';

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

//determine roomprice based on roomtype
if($_POST['roomtype'] == "Deluxe"){
    $roomprice = 300;
	}
else if($_POST['roomtype'] == "Superior"){
    $roomprice = 200;
	}
else{
    $roomprice = 100;
	}
	
// Store query in variable
$query="UPDATE reservation
	SET fullname = '".$_POST['fullname']."',
		contactno = '".$_POST['contactno']."',
		passport = '".$_POST['passport']."',
		roomtype = '".$_POST['roomtype']."',
		roomprice = $roomprice,
		num_of_rooms = '".$_POST['num_of_rooms']."',
		dor = '".$_POST['dor']."',
		dco = '".$_POST['dco']."',
		length_of_stay = DATEDIFF (dco,dor),
		payment = (roomprice*num_of_rooms*length_of_stay)
	
	WHERE reservation_id = '".$_POST['reservation_id']."'
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo "You have been successfully change your reservation!";

// Closing connection
mysql_close($link);


?>