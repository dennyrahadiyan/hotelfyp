<?php 
include 'core/init.php';

protect_page();
include 'includes/overall/header.php'; 

//if form is being submitted
if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('reservation_id','bank_in_from','acc_no','holder_name');
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
	}
	
}
//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{
	echo "Your payment has been successfully made!!";
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
		reservation_payment($payment_data);
		//redirect and bring success variable
		header('Location: payment.php?success');
		exit();
	}
	
	//
	else if (empty($errors) === false)
	{
		echo output_errors($errors);
	}

?>

<h1>Payment </h1>



<fieldset>
<legend> 
	<font size="6">Please input your information correctly</font>
</legend>

<p>

<form action="" method="post">
	<ul>
		<li>
			Your Reservation Number: <br>
			<input type="text" name="reservation_id">
		</li>
		<li>
			Bank in From: <br>
			<select name="bank_in_from" id="bank_in_from">
			<option value="">Select</option>
            <option value="CIMB">CIMB</option>
            <option value="Maybank">Maybank</option>
			<option value="RHB">RHB</option>
			<option value="Hong Leong Bank">Hong Leong Bank</option>
          </select>
		</li>
		<li>
			Account No.: <br>
			<input type="text" name="acc_no">
		</li>
		<li>
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