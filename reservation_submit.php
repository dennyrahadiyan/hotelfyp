<?php 
session_start();
include 'core/init.php';

protect_page();
include 'includes/overall/header.php' ; 
$_SESSION = $_POST;

//what does this line does is that to check whether success is in the end of the URL
if(isset($_GET['success']) && empty($_GET['success']))
{

	view_reservation();

}
else
{//if there are no errors

		check_availability();

}
?>