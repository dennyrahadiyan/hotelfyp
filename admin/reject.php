<?php 

include 'includes/overall/header_admin.php' ;
	require 'core/database/connect2.php';
	$reservation_id = 0;
	
	if ( !empty($_GET['reservation_id'])) {
		$reservation_id = $_REQUEST['reservation_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$reservation_id = $_POST['reservation_id'];

				
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql1 = "DELETE FROM `payment` WHERE `reservation_id` = ?";
		$sql2 = "UPDATE `reservation` SET `payment_status` = 'Pending' WHERE `reservation_id` = ?";
		$q = $pdo->prepare($sql1);
		$q->execute(array($reservation_id));
		$q1 = $pdo->prepare($sql2);
		$q1->execute(array($reservation_id));
		Database::disconnect();
		header("Location: payment_mgmt.php");
		
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Reject Payment?</h3>
		    		</div>
		    		<?php echo $reservation_id;?>
	    			<form class="form-horizontal" action="reject.php" method="post">
	    			  <input type="hidden" name="reservation_id" value="<?php echo $reservation_id;?>"/>
					  <p class="alert alert-error">Are you sure to reject ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="payment_mgmt.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>