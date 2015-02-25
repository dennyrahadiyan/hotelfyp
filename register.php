<?php 
include 'core/init.php';

logged_in_redirect();
include 'includes/overall/header.php' ; 

//if form is being submitted
if(empty($_POST)=== false)
{
	//to validate whether user enters smtg or not otherwise no point continue to do the next validation
	//create an array
	$required_fields = array ('username','password','password_again','first_name','email','passport','gender','contactno','address');
	foreach($_POST as $key=>$value)
	{
		
		//if the key (value) in array of $required_fields is true which is empty
		if(empty($value) && in_array ($key, $required_fields) === true )
		{
			$errors[] = '<p style="background-color:#FBD6D6;">Fields marked with an asterisk are compulsory!</p>';
			//the validation can happen to more than 1 field
			break 1;
		}
	}
	
	if(empty($errors) === true)
	{
		if(user_exists($_POST['username']) === true)
		{
			$errors[] = 'Sorry, the username \'' .$_POST['username'] . '\' is already taken.';
		}
		//search for the string,  preg_match(search_pattern, your_string)
		// \s = white space character
		//if(preg_match("/\\s/", $_POST['username']) == true)
		if(preg_match("/\s/", $_POST['username']) == true)
		{
			$errors[] = 'Your username must not contain space.';
		}
		if(strlen($_POST['password']) < 6)
		{
			$errors[] = 'Your password must be at least 6 characters';
		}
		if($_POST['password'] !== $_POST['password_again'])
		{
			$errors[] = 'Your passwords do not match at all';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
		{
			$errors[] = 'A valid email address is required';
		}
		if(email_exists($_POST['email']) === true)
		{
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
		}
		if(preg_match("/\s/", $_POST['passport']) == true)
		{
			$errors[] = 'Your passport must not contain space!!.';
		}
		else if(preg_match("/\s/", $_POST['gender']) == true)
		{
			$errors[] = 'Your gender must not contain space.';
		}
		else if (!preg_match('/^[0-9]\d{7,10}$/', $_POST['contactno'])) 
		{
			
			$errors[] = 'Enter your contact number correctly!!.';
		}		
	}
}
//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{
?>
	<body>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center; font-size: 36px; font-weight: bold;">REGISTRATION SUCCESS</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">You may log in now</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;"><img src="img/sucess.png" alt=""/></p>
</body>
</html>
<?php
}
else
{//if there are no errors
	if (empty($_POST) === false && empty($errors) === true)
	{
		//create an array of $register_data for sanitizing purpose ,prevent SQL injection attactk
		$register_data = array
		(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'passport' => $_POST['passport'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'gender' => $_POST['gender'],	
			'email' => $_POST['email'],
			'contactno' => $_POST['contactno'],
			'address' => $_POST['address']
		);
		register_user($register_data);
		//redirect and bring success variable to register.php
		header('Location: register.php?success');
		exit();
	}
	
	//
	else if (empty($errors) === false)
	{
		echo output_errors($errors);
	}

?>


<form action="" method="post">
<fieldset><legend><span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="4" color="gray">Register</font> </span></legend>
	<ul>
		<li>
			Username*:<br>
			<input type="text" name="username" value="<?php echo $_POST['username']; ?>">
		</li>
		<li>
			Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
		</li>
		<li>
		</li>
		<li>
		</fieldset>
		<br>
		<br>
		<fieldset>
		<legend>
		<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="4" color="gray">Enter Your Details</font> </color></span></legend>
		  <table width="200" border="0">
		    <tr>
		      <td width="157" scope="col">First name*: <br>
                <input type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>">              </td>
		      <td width="439" scope="col">Last name: <br>
                <input type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>">              </td>
	        </tr>
		    <tr>
		      <td><p>Gender*:
                  <select name="gender" id="gender">
				  <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </p></td>
		      <td>&nbsp;</td>
	        </tr>
		    <tr>
		      <td>Passport: <br>
              <input type="text" name="passport" value="<?php echo $_POST['passport']; ?>"></td>
		      <td>&nbsp;</td>
	        </tr>
		    <tr>
		      <td><p>Email*:<br>
	            <input type="text" name="email" value="<?php echo $_POST['email']; ?>">
              </p></td>
		      <td><p>Contact No*:<br>
                  <input type="text" name="contactno" id="contactno" value="<?php echo $_POST['contactno']; ?>">
		      </p></td>
	        </tr>
		    <tr>
		      <td colspan="2"><p>Address*<br>
                  <input name="address" type="text" size="100" value="<?php echo $_POST['address']; ?>">
		      </p></td>
	        </tr>
	      </table>
		</li>

			<input type="submit" value="Register">

	</ul>
	</fieldset>
</form>

<?php 
}
include 'includes/overall/footer.php' ; ?>