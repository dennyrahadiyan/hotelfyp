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
		$fullname=$row['fullname'];
		$contactno=$row['contactno'];
		$passport=$row['passport'];
        $roomtype=$row['roomtype'];
		$num_of_rooms=$row['num_of_rooms'];
		$dor=$row['dor'];
		$dco=$row['dco'];
		
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

}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dor",
			dateFormat:"%Y-%m-%d"
			
		});
		
		new JsDatePick({
			useMode:2,
			target:"dco",
			dateFormat:"%Y-%m-%d"
			
		});
	};
	
	
</script>
</head>

<h1>RESERVATION</h1>
<form method=post action=core\functions\reservation_change.php>
<fieldset>
<legend> 
	<font size="6">Change your reservation</font>
</legend>

  <ul>
    <li>Full Name:  </li>
    <li>
      <input type="text" name="fullname" value="<?php echo $fullname;?>">
      <br />
      Contact No:</li>
    <li>
      <input type="text" name="contactno" value="<?php echo $contactno;?>"><br />
	  Passport:</li>
    <li>
      <input type="text" name="passport" value="<?php echo $passport;?>"><br />
      Room Type:</li>
    <li>
      <select name="roomtype" id="roomtype">
            <option value="Single">Single</option>
            <option value="Superior">Superior</option>
			<option value="Deluxe">Deluxe</option>
          </select><br />
      No. of Rooms:</li>
    <li>
      <input type="text" name="num_of_rooms" id="num_of_rooms" value="<?php echo $num_of_rooms;?>"><br />
      Check-in date:</li>
    <li>
      <input type="text" name="dor" id="dor" value="<?php echo $dor;?>"><br />
      Check-out date:</li>
    <li>
      <input type="text" name="dco" id="dco" value="<?php echo $dco;?>"><br />
      <input type="hidden" name="reservation_id" value="<?php echo $_GET['reservation_id'];?>"><br />
      <input type=submit value="Change">
    </li>
  </ul>
  </fieldset>
</form>
</html>