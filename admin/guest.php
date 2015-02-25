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
 
<body style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
    <div class="container">
            <div class="row">
                <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Online Guestbook</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
					<tr bgcolor=#A9D0F5>
					  <th>ID</th>
					  <th>Username</th>
                      <th>First Name</th>
                      <th>Last Name</th>
					  <th>Contact</th>
                      <th>Passport</th>
					  <th>Gender</th>
					  <th>Email</th>
					  <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'core/database/connect2.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM users ORDER BY user_id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['user_id'] . '</td>';
							echo '<td>'. $row['username'] . '</td>';
                            echo '<td>'. $row['first_name'] . '</td>';
                            echo '<td>'. $row['last_name'] . '</td>';
							echo '<td>'. $row['contactno'] . '</td>';
                            echo '<td>'. $row['passport'] . '</td>';
							echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['email'] . '</td>';
							echo "<td><a href='deleteguest.php?user_id=".$row['user_id']."'>";?><img src="img/deletebutton.png" width="20" height="25"  alt=""/></a>  <?php
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

<?php
include 'includes/overall/footer.php' ;
?>