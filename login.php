<?php
include 'core/init.php';
include 'flash2.php';

logged_in_redirect();

// double equal is the same as triple equal, it just that triple equal checks the value type
//if the fields are filled
if(empty($_POST)===false)
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//if the username field is empty or password field is empty
	if (empty($username) === true || empty($password)=== true)
	{
		//Serrors[] is the array taken from init.php
		$errors[] = 'You\'ve to enter a username and password';
	}
	//check if the user is exist in db
	//the function is included in init.php which it required the function under core/function/user
	else if (user_exists($username) === false)
	{
		$errors[] = 'The username doestn\'t exist. Have you registered?';
	}
	//check if the user account has been activated by admin.
	else if (user_active($username) === false)
	{
		$errors[] = 'You account hasn\'t been activated yet. Please come back again. ';
	}
	else
	{
		if(strlen($password) > 50)
		{
			$errors[] = 'Password is too long';
			
		}
		//call the function login
		$login = login($username,$password);
		//if password and username are false
		if($login === false)
		{
			$errors[] = 'That username/password combination is incorrect';
		}
		//once user has successfully entered the username and password
		else
		{
			//set the user session
			//equal to login function because the function return user_id on user.php
			$_SESSION['user_id'] = $login;
			//redirect user to home upon successful login
			header('Location: index.php');
			//exit the script
			exit();	
		}
	}
}
else {
	$errors[] = 'No data received';
}
include 'includes/overall/header.php';

//if there is an error
if(empty($errors) === false)
{
	echo output_errors($errors);
}
include 'includes/overall/footer.php';
?>
