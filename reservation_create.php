<?php 
include 'core/init.php';

protect_admin();
include 'includes/overall/header_admin.php' ; 


//if form is being submitted
if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('user_id','full_name','passport','num_of_rooms','dor','dco');
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
		if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dor']))
		{
			echo 'Input your Date of Reservation correctly!';
			?>
			Click <a href="reservation.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dco']))
		{
			echo 'Input your Check-out date correctly!';
			?>
			Click <a href="reservation.php">here</a> to try again!
			<?php
			exit();
		}
		
		else if (!preg_match('/^[1-9][0-9]{0,2}$/', $_POST['num_of_rooms'])) 
		{
			echo 'Your Number of rooms must be filled!';
			?>
			</br>
			Click <a href="reservation.php">here</a> to try again!
			<?php
			exit();
		}
	}
}
//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{
	reservation_receipt();
	
	echo "<a href=reservation_mgmt.php>Go Back</a>";
}
else
{//if there are no errors
	if (empty($_POST) === false && empty($errors) === true)
	{
		//create an array of $register_data for sanitizing purpose ,prevent SQL injection attactk
		$reservation_data = array
		(
			'user_id' => $_SESSION['user_id'],
			'fullname' => $_POST['full_name'],
			'contactno' => $_POST['contactno'],
			'passport' => $_POST['passport'],
			'roomtype' => $_POST['roomtype'],
			'num_of_rooms' => $_POST['num_of_rooms'],
			'dor' => $_POST['dor'],	
			'dco' => $_POST['dco']	
		);
		user_reservation($reservation_data);
		//redirect and bring success variable to register.php
		header('Location: reservation_create.php?success');
		exit();
	}
	
	//
	else if (empty($errors) === false)
	{
		echo output_errors($errors);
	}

?>
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



<h1>RESERVATION </h1>


<form action="" method="post">
<fieldset>
<legend> 
	<font size="6">Please input your information correctly</font>
</legend>

<p>

<form action="" method="post">
	<ul>
		<li>
			Full name*: <br>
			<input type="text" name="full_name">
		</li>
		<li>
			Contact No.: <br>
			<input type="text" name="contactno">
		</li>
		<li>
			IC/Passport*: <br>
			<input type="text" name="passport">
		</li>
		<li>
			Room Type*: <br>
			<select name="roomtype" id="roomtype">
            <option value="Single">Single</option>
            <option value="Superior">Superior</option>
			<option value="Deluxe">Deluxe</option>
          </select>
	    </li>
	  <li>Number of Rooms*:</li>
	  
  <select name="num_of_rooms" id="num_of_rooms">
            <option value="1">1</option>
            <option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
            <option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
            <option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
          </select>
	    <br>
      
		<li>
			Date of reservation*: <br>
			<input type="text" size="12" id="dor" name="dor"/>
  
		</li>
		<li>
			Check-out Date*: <br>
			<input type="text" size="12" id= "dco" name="dco"/>
		</li>

		  <input type="submit" value="Submit">
  <input type="reset" value="Clear" >
		<li>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</ul>
</form>

<?php
}
include 'includes/overall/footer.php' ;
?>