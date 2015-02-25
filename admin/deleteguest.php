<?php 

include 'includes/overall/header_admin.php' ;
	require 'core/database/connect2.php';
	$user_id = 0;
	
	if ( !empty($_GET['user_id'])) {
		$user_id = $_REQUEST['user_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$user_id = $_POST['user_id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM users WHERE user_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($user_id));
		Database::disconnect();
		header("Location: guest.php");
		
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
		    			<h3>Delete a Customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="deleteguest.php" method="post">
	    			  <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="guest.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>