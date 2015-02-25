<?php
ob_start(); 


//remove unnecessary details
error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

//check whether user login
if (logged_id() === true )
{
	//set the session
	$session_user_id = $_SESSION['user_id'];
	//grab the data
	$user_data = user_data($session_user_id, 'user_id','username','password','first_name','last_name','email','passport','gender','contactno','address');

	//disable user account that has not been activated yet
	if(user_active($user_data['username']) === false)
	{
		session_destroy();
		header('Location:index.php');
		exit();
	}
//$user_data now is an array
}


$errors = array();
?>