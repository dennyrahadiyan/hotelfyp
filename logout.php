<?php
session_start();
session_destroy();
//redirect the user to homepage
header('Location: index.php');

?>