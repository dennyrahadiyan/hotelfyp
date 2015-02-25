<?php 
include 'core/init.php';

protect_page();
include 'includes/overall/header.php' ; 


		
//if form is being submitted
if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('user_id','fullname','contactno','passport','dor','dco');
	foreach($_POST as $key=>$value)
	{
		
		//if the key (value) in array of $required_fields is true which is empty
		if(empty($value) && in_array ($key, $required_fields) === true )
		{
			$errors[] = '<p style="background-color:#FBD6D6;">You must filled up all of the fields</p>';
			//the validation can happen to more than 1 field
			break 1;
		}
	}
	
	if(empty($errors) === true)

	{
		if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dor']))
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Input your Date of Reservation Correctly!</p>';
		}
		
		else if (!preg_match('/^[a-z A-Z]{3,30}$/', $_POST['fullname'])) 
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Input your full name correctly!!</p>';

		}
		
		else if (!preg_match('/^[0-9]\d{9}$/', $_POST['contactno'])) 
		{
			
			$errors[] = '<p style="background-color:#FBD6D6;">Enter your contact number correctly!!</p>';

		}
		
		else if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dco']))
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Input your Check-out date correctly!</p>';

		}
		
		
		else if (strtotime($_POST['dor']) < time()) 
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Date of reservation cannot be in the past!</p>';

		}

		else if (strtotime($_POST['dco']) < strtotime($_POST['dor'])) 
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Check-out date cannot be before Date of Reservation!</p>';

		}

	}
}
//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{

	view_reservation();

}
else
{//if there are no errors
	if (empty($_POST) === false && empty($errors) === true)
	{
		check_availability();
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



<h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">RESERVATION </h1>

<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
<form action="" method="post">
<fieldset>
</span>
<legend> 
<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="6">Please input your information correctly</font> </span></legend>

<p>

<form action="" method="post">
	<ul>
		<li>
			Full name*: <br>
			<input type="text" name="fullname" value="<?php echo $_POST['fullname']; ?>">
		</li>
		<li>
			Contact No.: <br>
			<input type="text" name="contactno" value="<?php echo $_POST['contactno']; ?>">
		</li>
		<li>
			IC/Passport*: <br>
			<input type="text" name="passport" value="<?php echo $_POST['passport']; ?>">
		</li>
		<li>
			Room Type*: <br>
			<select name="roomtype" id="roomtype">
			<option value="">Select</option>
            <option value="Single">Single (1 Person, RM 150)</option>
            <option value="Superior">Superior (2 Person, RM 200)</option>
			<option value="Deluxe">Deluxe (4 Person, RM 280)</option>
          </select>
	    </li>
			<br>
		<li>
			Date of reservation*: <br>
			<input type="text" size="12" id= "dor" name="dor" value="<?php echo $_POST['dor']; ?>"/>
		</li>
		<li>
			Check-out Date*: <br>
			<input type="text" size="12" id= "dco" name="dco" value="<?php echo $_POST['dco']; ?>"/>
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