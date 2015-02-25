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
		$dor=$row['dor'];
		$dco=$row['dco'];
		
	}
}
else {
	$fullname="";
	$contactno="";
	$passport="";
	$roomtype="";
	$dor="";
	$dco="";

}

if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('user_id','full_name','passport','dor','dco');
	foreach($_POST as $key=>$value)
	{
		
		//if the key (value) in array of $required_fields is true which is empty
		if(empty($value) && in_array ($key, $required_fields) === true )
		{
			$errors[] = 'You must filled up all of the fields';
			//the validation can happen to more than 1 field
			break 1;
		}
		
	}
	if (strtotime($_POST['dor']) < time()) 
		{
			echo 'Date of reservation cannot be in the past!';
			?>
			</br>
			Click <a href="change2.php?reservation_id=<?php echo $_GET['reservation_id']?>">here</a> to try again!
			<?php
			exit();
		}

		else if (strtotime($_POST['dco']) < strtotime($_POST['dor'])) 
		{
			echo 'Check-out date cannot be before Date of Reservation!';
			?>
			</br>
			Click <a href="change2.php?reservation_id=<?php echo $_GET['reservation_id']?>">here</a> to try again!
			<?php
			exit();
		}
	
}

		
//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{

?>
	<body>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center; font-size: 36px; font-weight: bold;">SUCCESSFULLY CHANGED</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">Your reservation successfully changed</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">Click <a href=reservation_change.php>here</a> to go back</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;"><img src="img/sucess.png" alt=""/></p>
</body>
</html>
<?php
	
}
else
{//if there are no errors
	if (empty($_POST) === false && empty($errors) === true)
	{
		check_availability_update();
	}
	
	//
	else if (empty($errors) === false)
	{
		echo output_errors($errors);
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

<h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">RESERVATION</h1>
<form method="post" action="">
<fieldset>
<legend> 
	<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="6">Change your reservation</font></span>
</legend>

  <ul>
    <li style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Full Name:  </li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
      <input type="text" name="fullname" value="<?php echo $fullname;?>">
      <br />
	  
      Contact No:</span></li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
      <input type="text" name="contactno" value="<?php echo $contactno;?>">
      <br />
	  Passport:</span></li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
      <input type="text" name="passport" value="<?php echo $passport;?>">
      <br />
      Room Type:</span></li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
          <select name="roomtype" id="roomtype">
            <option value="Single">Single</option>
            <option value="Superior">Superior</option>
            <option value="Deluxe">Deluxe</option>
          </select>
          <br />
      Check-in date:</span></li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
      <input type="text" name="dor" id="dor" value="<?php echo $dor;?>">
      <br />
      Check-out date:</span></li>
    <li>
      <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
      <input type="text" name="dco" id="dco" value="<?php echo $dco;?>">
      </span><br />
      <input type="hidden" name="reservation_id" value="<?php echo $_GET['reservation_id'];?>"><br />
      <input type=submit value="Change">
    </li>
  </ul>
  </fieldset>
</form>
</html>
<?php
}
include 'includes/overall/footer.php' ;
?>