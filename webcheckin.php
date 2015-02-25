<?php
include 'core/init.php';

protect_page();
include 'includes/overall/header.php' ; 



?>
<fieldset>
<legend> 
	<font size="6" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Web Check-in</font>
</legend>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">More convenient with Web-Check-in. You no need to waste your time at the counter. Check-in now and get your room number now.</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Enter your Reservation No.</p>
<form  method="post" action="webcheckin.php?go"  id="searchform">
      <input  type="text" name="reservation_id">
            <input  type="submit" name="submit" value="Search" />
            </form>

<?php
checkin_search();


?>

<?php
if(isset($_GET['success'])){
echo "You Have Been Successfully Checked-in!";
}
include 'includes/overall/footer.php' ;
?>