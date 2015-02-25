<?php

// initialize
session_start();

// database connection
include 'core/database/connect.php';

// retrieve username and password
$login = mysql_query("SELECT * FROM admin WHERE (adminname = '" . mysql_real_escape_string($_POST['adminname']) . "') and (adminpwd = '" . mysql_real_escape_string($_POST['adminpwd']) . "')");

// check username and password match
if (mysql_num_rows($login) == 1) {

// Set username session variable
$_SESSION['adminname'] = $_POST['adminname'];

// Jump to secured page
header('Location: ../admin.php');
}
else {
// Jump to login page
header('Location: admin_login.php');
}

?>