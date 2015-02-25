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
		$payment=$row['payment'];
		
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
	$room_num="";
	$payment=="";

}

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';
	
// Store query in variable
$query="INSERT INTO room_booked (reservation_id, room_num, dor, dco)
		VALUES
		(
		$reservation_id,
		$room_num, 
		'$dor', 
		'$dco'
		)
		";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


// Closing connection
mysql_close($link);

echo "<h1>Your reservation is completed!!</h1><br>";

?>

<table width="327" border="0">
  <tr>
    <th width="173" scope="col">Reservation No: </th>
    <th width="144" scope="col"><?php echo $reservation_id;?></th>
  </tr>
  <tr>
    <td>Full Name</td>
    <td width="144" scope="col"><?php echo $fullname;?></td>
  </tr>
  <tr>
    <td>Contact No. </td>
    <td width="144" scope="col"><?php echo $contactno;?></td>
  </tr>
  <tr>
    <td>Passport No. </td>
    <td width="144" scope="col"><?php echo $passport;?></td>
  </tr>
  <tr>
    <td>Room Type </td>
    <td width="144" scope="col"><?php echo $roomtype;?></td>
  </tr>
  <tr>
    <td>Check-in Date</td>
    <td width="144" scope="col"><?php echo $dor;?></td>
  </tr>
  <tr>
    <td>Check-out Date</td>
    <td width="144" scope="col"><?php echo $dco;?></td>
  </tr>
  <tr>
    <td>Room No.</td>
    <td width="144" scope="col"><?php echo $room_num;?></td>
  </tr>
  <tr>
    <td>Total Payment</td>
    <td width="144" scope="col"><?php echo $payment;?></td>
  </tr>
</table>
<p>
  <?php
echo "<h1>$status</h1>";
?>
</p>
<p><a href="print.php?reservation_id=<?php echo $reservation_id; ?>"><img src="img/print.gif" width="42" height="47"  alt=""/></a></p>
<?php
include 'includes/overall/footer.php' ;
?>