<?php 

include 'includes/overall/header_admin.php' ;
	require 'core/database/connect2.php';
	$transaction_id = 0;
	
	if ( !empty($_GET['transaction_id'])) {
		$transaction_id = $_REQUEST['transaction_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$transaction_id = $_POST['transaction_id'];
		
		// confirm data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE `payment` SET `status` = 'Paid' WHERE `transaction_id` = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($transaction_id));
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
		    			<h3>Confirm Payment?</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="confirm.php" method="post">
	    			  <input type="hidden" name="transaction_id" value="<?php echo $transaction_id;?>"/>
					  <p class="alert alert-error">Are you sure to confirm ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="payment_mgmt.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>