<?php 

include 'includes/overall/header_reservation.php' ;
	require 'core/database/connect2.php';
	$room_num = 0;
	
	if ( !empty($_GET['room_num'])) {
		$room_num = $_REQUEST['room_num'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$room_num = $_POST['room_num'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "
				UPDATE room SET room_status='Available' WHERE room_num = ?;
				";
		$q = $pdo->prepare($sql);
		$q->execute(array($room_num));
		Database::disconnect();
		header("Location: room_mgmt.php");
		
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
		    			<h3>Available</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="available.php" method="post">
	    			  <input type="hidden" name="room_num" value="<?php echo $room_num;?>"/>
					  <p class="alert alert-error">Set room as available ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="room_mgmt.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>