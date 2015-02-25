<?php
/*
using "mysql_real_escape_string" is to prevent anyone to log in without a valid password 
to escape some characters to prevent SQL injection attacks 
*/

function logged_in_redirect() 
{
	if(logged_id() === true)
	{
		header('Location: index.php ');
		exit();
	}
}


//function admin_page() 
//{
//if(logged_id() === false ) 
//	{
	//redirect them
//	header('Location: noaccess_admin.php');
//	exit();
//	}	
//}

function protect_page() 
{
	//if user hasnt log-in yet
	if(logged_id() === false) 
	{
	//redirect them
	header('Location: protected.php');
	exit();
	}
}

function protect_admin()
{
session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}
}

function array_sanitize(&$item)
{
	$item = mysql_real_escape_string($item);
}


function sanitize($data)
{
	return mysql_real_escape_string($data);
}

function output_errors($errors)
{
//implode returns a string from the elements of an array
	return '<ul>' . implode('</li><li>', $errors) . '</li></ul>'; 
}

?>