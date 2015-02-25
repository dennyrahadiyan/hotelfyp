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
		$sql = "DELETE FROM reservation WHERE reservation_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($reservation_id));
		Database::disconnect();
		header("Location: reservation_mgmt2.php");
		
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
		    			<h3>Delete reservation</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete2.php" method="post">
	    			  <input type="hidden" name="reservation_id" value="<?php echo $reservation_id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="reservation_mgmt2.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>