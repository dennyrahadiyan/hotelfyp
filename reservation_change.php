<?php
include 'core/init.php';

protect_page();
include 'includes/overall/header.php' ; 

?>
<fieldset>
<legend> 
<font size="6" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Your Reservation</font></legend>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">You may check or change your reservation</p>
<p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Enter your Reservation No.</p>
<form  method="post" action="reservation_change.php?go"  id="searchform">
      <input  type="text" name="reservation_id">
            <input  type="submit" name="submit" value="Search" />
            </form>

<?php
reservation_search();
include 'includes/overall/footer.php' ;
?>
