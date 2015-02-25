<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}

include 'core/init.php';
include 'includes/overall/header_reservation.php'; 
?>
<fieldset>
<legend> 
	<font size="6">Enter Your Reservation Number</font>
</legend>
<form  method="post" action="reservation_search.php?go"  id="searchform">
      <input  type="text" name="reservation_id">
            <input  type="submit" name="submit" value="Search" />
            </form>

<?php
reservation_search();
?>
