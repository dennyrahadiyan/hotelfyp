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
            <div class="row">
			
                <table class="table table-striped table-bordered" style="width:900px">
                  <thead>
                    <tr>
				    <tr bgcolor=#A9D0F5>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Reservation</td>
                      <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Fullname</td>
                      <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Contact</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Passport</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Type</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Room</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Date in</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Date out</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Payment</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Status</td>



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
                            echo '<td>'. $row['contactno'] . '</td>';
                            echo '<td>'. $row['passport'] . '</td>';
							echo '<td>'. $row['roomtype'] . '</td>';
							echo '<td>'. $row['room_num'] . '</td>';
							echo '<td>'. $row['dor'] . '</td>';
							echo '<td>'. $row['dco'] . '</td>';
							echo '<td>'. $row['payment'] . '</td>';
							echo '<td>'. $row['status'] . '</td>';	
							echo "<td><a href='delete2.php?reservation_id=".$row['reservation_id']."'>";?><img src="img/deletebutton.png" width="20" height="25"  alt=""/></a><?php
							echo "<td><a href='change2.php?reservation_id=".$row['reservation_id']."'>";?><img src="img/change.png" width="20" height="25"  alt=""/></a><?php
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
<?php include 'includes/overall/footer.php' ;?>