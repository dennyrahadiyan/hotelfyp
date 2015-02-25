<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}


include 'core/functions/users.php';	 
include 'includes/overall/header_reservation.php' ;
?>

<!DOCTYPE html>
<html lang="en">

 
<body style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
    <div class="container">
			<p>
			</p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
				    <tr bgcolor=#A9D0F5>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Reservation Number</td>
                      <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Fullname</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Room type</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Check-in date</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Check-out date</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Payment</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Status</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Check-in</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'core/database/connect2.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM reservation ORDER BY reservation_id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['reservation_id'] . '</td>';
                            echo '<td>'. $row['fullname'] . '</td>';
							echo '<td>'. $row['roomtype'] . '</td>';
							echo '<td>'. $row['dor'] . '</td>';
							echo '<td>'. $row['dco'] . '</td>';
							echo '<td>'. $row['payment'] . '</td>';
							echo '<td>'. $row['status'] . '</td>';
							if ($row['status'] == 'Pending'){
							echo "<td><a href='checkin.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/checkin2.png" width="130" height="25"  alt=""/></a>  <?php
								}
							else {
							echo "";
							}
							
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
				  
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>