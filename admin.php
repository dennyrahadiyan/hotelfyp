<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin/admin_login.php');
}

?>
<?php 

include 'includes/overall/header_admin.php' ;
?>

<body>
<table width="436" border="0" align="center">
  <tr>
    <th colspan="7" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 24px;" scope="col"><p>CONTROL PANEL</p>
    <p>&nbsp;</p></th>
  </tr>
  <tr>
    <th width="150" valign="top" scope="col"><p><a href="admin/guest.php"><img src="img/User-Role-Guest-icon.png" width="100" height="100"  alt=""/></a></p>
    <p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Online Guestbook</p></th>
    <th width="14" valign="top" scope="col">&nbsp;</th>
    <th width="14" valign="top" scope="col">&nbsp;</th>
    <th width="150" valign="top" scope="col"><p><a href="admin/reservation_mgmt2.php"><img src="img/calendar.png" width="100" height="100"  alt=""/></a></p>
    <p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Reservation</p></th>
    <th width="14" valign="top" scope="col">&nbsp;</th>
    <th width="14" valign="top" scope="col">&nbsp;</th>
    <th width="150" valign="top" scope="col"><p><a href="admin/payment_mgmt.php"><img src="admin/img/c5eea9b377ba.png" width="100" height="100"  alt=""/></a></p>
    <p style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">View Pending Payments</p></th>
  </tr>
  <tr>
    <th style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;"><p><a href="admin/core/functions/admin_logout.php"><img src="img/logout-icon.png" width="100" height="100"  alt=""/></a></p>
    <p>Log Out</p></th>
    <th style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">&nbsp;</th>
    <th style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="text-align: center">&nbsp;</td>
    <td style="text-align: center">&nbsp;</td>
    <td style="text-align: center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php
include 'includes/overall/footer.php' ;
?>