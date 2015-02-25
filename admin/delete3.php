<?php
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

$id=$_GET['reservation_id'];

// Store query in variable
$query = "DELETE FROM reservation WHERE reservation_id = $id";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Closing connection
mysql_close($link);

header("Location: reservation_mgmt2.php");
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
		    		
	    			<form class="form-horizontal" action="delete3.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="index.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>