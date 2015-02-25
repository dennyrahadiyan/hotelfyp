<?php


    include 'core/init.php';

    protect_page();
include 'includes/overall/header.php' ;

?>

<!DOCTYPE html>
<html lang="en">

 
<body>
    <div class="container">
            <div class="row">
			<h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">NOTIFICATION</h1>
                  <?php
                   include 'core/database/pdo_connect.php';
				   $user_id = $_SESSION['user_id'];
                   $pdo = Database::connect();
                   $sql = "SELECT * FROM confirmed_payment WHERE user_id = $user_id AND checkin_status = 'Pending'";
                   foreach ($pdo->query($sql) as $row) {
                            echo "<li>Your reservation number ". $row['reservation_id'] ." is ready to check-in</li>";

                   }
                   Database::disconnect();
                  ?>
        </div>
    </div> <!-- /container -->
  </body>
</html>
<?php include 'includes/overall/footer.php' ;?>