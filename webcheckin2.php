<?php
include 'core/init.php';

protect_page();
include 'includes/overall/header.php' ; 
?>
<fieldset>
<legend> 
	<font size="6">Enter Your Reservation Number</font>
</legend>
<form  method="post" action="webcheckin.php?go"  id="searchform">
      <input  type="text" name="reservation_id">
            <input  type="submit" name="submit" value="Search" />
            </form>

<?php
checkin_search2();
?>