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
		$dor=$row['dor'];
		$dco=$row['dco'];
		$room_num=$row['room_num'];
		$payment=$row['payment'];
		$status=$row['status'];
		
	}
}
else {
	$fullname="";
	$contactno="";
	$passport="";
	$roomtype="";
	$dor="";
	$dco="";
	$room_num="";
	$payment="";
	$status="";

}
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
