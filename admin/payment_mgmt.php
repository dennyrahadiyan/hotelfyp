<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}


include 'core/functions/users.php';	 
include 'includes/overall/header_admin.php' ;

?>

<!DOCTYPE html>
<html lang="en">

 
<body>
    <div class="container">
            <div class="row">
                <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Pending Payments</h3>
            </div>
            <div class="row">
			<p>
			
			</p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
				    <tr bgcolor=#A9D0F5>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Transaction No.</td>
                      <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Reservation No.</td>
                      <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">User ID</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Bank From</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Account No.</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Holder Name</td>
					  <td style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'core/database/connect2.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM payment WHERE status = "Pending" ORDER BY transaction_id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['transaction_id'] . '</td>';
                            echo '<td>'. $row['reservation_id'] . '</td>';
                            echo '<td>'. $row['user_id'] . '</td>';
                            echo '<td>'. $row['bank_in_from'] . '</td>';
							echo '<td>'. $row['acc_no'] . '</td>';
							echo '<td>'. $row['holder_name'] . '</td>';
							echo "<td><a href='confirm.php?transaction_id=".$row['transaction_id']."'>";?><img src="button/confirm.png" width="100" height="25"  alt=""/></a>  <?php
							echo "<td><a href='reject.php?reservation_id=".$row['reservation_id']."'>";?><img src="button/reject.png" width="100" height="25"  alt=""/></a>  <?php
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
				  
                  </tbody>
            </table>
			<a href="../admin.php">Go Back</a>
        </div>
    </div> <!-- /container -->
  </body>
</html>