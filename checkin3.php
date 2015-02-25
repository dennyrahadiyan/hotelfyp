<?php 

include 'includes/overall/header_checkin.php' ;
	require 'core/database/pdo_connect.php';
	$reservation_id = 0;
	
	if ( !empty($_GET['reservation_id'])) {
		$reservation_id = $_REQUEST['reservation_id'];
	}
	
		
		// set update to checked-in
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql1 = "UPDATE reservation
				SET status='Checked-in'
				WHERE reservation_id = ?";
		$sql2 = "UPDATE confirmed_payment
				SET checkin_status='Checked-in'
				WHERE reservation_id = ?";
		$q = $pdo->prepare($sql2);
		$q->execute(array($reservation_id));
		$q1 = $pdo->prepare($sql1);
		$q1->execute(array($reservation_id));
		Database::disconnect();
		
?>
<body style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; text-align: center;">
<span style="text-align: center"></span>
<h1>YOUR RESERVATION SUCCESSFULLY CHECKED-IN!<span style="text-align: center"></span></h1>
<p>You can get your room number by clicking the button below</p>
<p><a href="getroom.php?reservation_id=<?php echo $reservation_id; ?>">
<img src="button/getroom.png" width="139" height="38"  alt=""/></a></p>
</body>

<?php
include 'includes/overall/footer.php' ;
?>