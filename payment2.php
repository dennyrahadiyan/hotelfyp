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
		$length_of_stay=$row['length_of_stay'];
		
	}
}
else {
	$reservation_id="";
	$fullname="";
	$contactno="";
	$passport="";
	$roomtype="";
	$dor="";
	$dco="";
	$length_of_stay="";

}

if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('bank_in_from','acc_no','holder_name');
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
	
	if(empty($errors) === true)
	{
		if(reservation_paid($_POST['reservation_id']) === true)
		{
			$errors[] = 'You have been paid for reservation no. \'' .$_POST['reservation_id'] . '\' ';
		}
		
		else if ($_POST['bank_in_from'] == "CIMB" && !preg_match('/^[0-9]\d{13}$/', $_POST['acc_no'])) 
		{
			echo 'Your CIMB account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		else if ($_POST['bank_in_from'] == "Maybank" && !preg_match('/^[0-9]\d{11}$/', $_POST['acc_no'])) 
		{
			echo 'Your Maybank account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if ($_POST['bank_in_from'] == "RHB" && !preg_match('/^[0-9]\d{13}$/', $_POST['acc_no'])) 
		{
			echo 'Your RHB account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}

		else if ($_POST['bank_in_from'] == "Hong Leong Bank" && !preg_match('/^[0-9]\d{12}$/', $_POST['acc_no'])) 
		{
			echo 'Your Hong Leong Bank account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if ($_POST['bank_in_from'] == "Public Bank" && !preg_match('/^[0-9]\d{9}$/', $_POST['acc_no'])) 
		{
			echo 'Your Public Bank account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if ($_POST['bank_in_from'] == "OCBC" && !preg_match('/^[0-9]\d{9}$/', $_POST['acc_no'])) 
		{
			echo 'Your OCBC account number is not valid!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if (!preg_match('/^[a-z A-Z]{3,30}$/', $_POST['holder_name'])) 
		{
			echo 'Input bank holder name correctly!!';
			?>
			</br>
			Click <a href="payment2.php">here</a> to try again!
			<?php
			exit();
		}
		
		
	}
	
}

if(isset($_GET['success']) && empty($_GET['success']))
{
?>
<body>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center; font-size: 36px; font-weight: bold;">SUCCESS</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">Your payment has been successfully made</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">We will notify you once your reservation is ready to check-in</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;"><img src="img/sucess.png" alt=""/></p>
</body>
</html>
<?php
}
else
{//if there are no errors
	if (empty($_POST) === false && empty($errors) === true)
	{
		//create an array of $payment_data
		$payment_data = array
		(
			'user_id' => $_SESSION['user_id'],
			'reservation_id' => $_POST['reservation_id'],
			'bank_in_from' => $_POST['bank_in_from'],
			'acc_no' => $_POST['acc_no'],
			'holder_name' => $_POST['holder_name']
			
		);
		//insert into payment database
		reservation_payment($payment_data);
		//update payment status from reservation table
		payment_status();
		//redirect and bring success variable
		header('Location: payment2.php?success');
		exit();
	}
	
	//
	else if (empty($errors) === false)
	{
		echo output_errors($errors);
	}

?>
</span>

<h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">PAYMENT</h1>

<fieldset>
<legend> 
	<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="6">Enter Your Payment Details Correctly</font></span>
</legend>

<p>

<form action="" method="post">
	<ul>
		<li>
		<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
			Your Reservation Number: <?php echo $reservation_id;?><br>
			<input type="hidden" name="reservation_id" value="<?php echo $reservation_id;?>">
		</li>
		<li>
		<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
			Bank in From: <br>
			<select name="bank_in_from" id="bank_in_from">
			<option value="">Select</option>
            <option value="CIMB">CIMB</option>
            <option value="Maybank">Maybank</option>
			<option value="RHB">RHB</option>
			<option value="Hong Leong Bank">Hong Leong Bank</option>
			<option value="Public Bank">Public Bank</option>
			<option value="OCBC">OCBC</option>
          </select>
		</li>
		<li>
		<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
			Account No.: <br>
			<input type="text" name="acc_no">
		</li>
		<li>
		<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
			Holder Name: <br>
			<input type="text" name="holder_name">
		</li>

		

		  <input type="submit" value="Submit">
  <input type="reset" value="Clear" >
		<li>

	</ul>
</form>

<?php
}
include 'includes/overall/footer.php' ;

?>