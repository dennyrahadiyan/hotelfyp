<?php

session_start();

if (!isset($_SESSION['adminname'])) {
header('Location: admin_login.php');
}


include 'core/functions/users.php';	 
include 'includes/overall/header_reservation.php' ;
?>
<?php
     
    require 'core/database/connect2.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $fullnameError = null;
        $contactnoError = null;
        $passportError = null;
		$roomtypeError = null;
		$dorError = null;
		$dcoError = null;

         
        // keep track post values
        $fullname = $_POST['fullname'];
        $contactno = $_POST['contactno'];
		$passport = $_POST['passport'];
		$roomtype = $_POST['roomtype'];
		$dor = $_POST['dor'];
		$dco = $_POST['dco'];

		
           
        // validate input
        $valid = true;
        if (empty($fullname)) {
            $fullnameError = 'Please enter Guest Full Name';
            $valid = false;
        }
		
		if (empty($contactno)) {
            $contactnoError = 'Please enter Guest contact';
            $valid = false;
        }
		
		if (empty($passport)) {
            $passportError = 'Please enter IC/Passport';
            $valid = false;
        }
		
		if (empty($roomtype)) {
            $roomtypeError = 'Please enter Guest Room Type';
            $valid = false;
        }
		
		if (empty($dor)) {
            $dorError = 'Please enter Check-in date';
            $valid = false;
        }
		
		
		if (empty($dco)) {
            $dcoError = 'Please enter Check-out date';
            $valid = false;
        }
		
		
		else if (strtotime($_POST['dor']) < time()) 
		{
			echo 'Date of reservation cannot be in the past!';
			?>
			</br>
			Click <a href="create_reservation.php">here</a> to try again!
			<?php
			exit();
		}

		else if (strtotime($_POST['dco']) < strtotime($_POST['dor'])) 
		{
			echo 'Check-out date cannot be before Date of Reservation!';
			?>
			</br>
			Click <a href="create_reservation.php">here</a> to try again!
			<?php
			exit();
		}
		
		//determine room price based on room type
         if($_POST['roomtype'] == "Deluxe"){
			$roomprice = 300;
			}
		else if($_POST['roomtype'] == "Superior"){
			$roomprice = 200;
			}
		else{
			$roomprice = 100;
			}
			
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO reservation (fullname,contactno,passport,roomtype,roomprice,dor,dco,length_of_stay,payment,bookingdate) 
					values(?, ?, ?, ?, $roomprice, ?, ?, DATEDIFF(dco,dor),(roomprice*length_of_stay),sysdate())";
            $q = $pdo->prepare($sql);
            $q->execute(array($fullname,$contactno,$passport,$roomtype,$dor,$dco));
            Database::disconnect();
            header("Location: reservation_mgmt2.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dor",
			dateFormat:"%Y-%m-%d"
			
		});
		
		new JsDatePick({
			useMode:2,
			target:"dco",
			dateFormat:"%Y-%m-%d"
			
		});
	};
	
	
</script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Create a Reservation</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group <?php echo !empty($fullnameError)?'error':'';?>">
                        <table width="600" border="0">
                          <tr>
                            <td width="110" scope="col"><label class="control-label" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Full Name</label></td>
                            <th width="450" align="left" scope="col"><span class="controls">
                              <input name="fullname" type="text" value="<?php echo !empty($fullname)?$fullname:'';?>">
                            
                            <?php if (!empty($fullnameError)): ?>
                              <span><?php echo $fullnameError;?></span>
                              <?php endif; ?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls"></div>
                      </div>
					  <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group <?php echo !empty($contactnoError)?'error':'';?>">
                        <table width="600" border="0">
                          <tr>
                            <td width="110" scope="col"><label class="control-label" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Contact no.</label></td>
                            <th width="450" align="left" scope="col"><span class="controls">
                              <input name="contactno" type="text"  value="<?php echo !empty($contactno)?$contactno:'';?>">
                            
                            <?php if (!empty($contactnoError)): ?>
                              <span><?php echo $contactnoError;?></span>
                              <?php endif; ?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls"></div>
                      </div>
					  <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group <?php echo !empty($passportError)?'error':'';?>">
                        <table width="600" border="0">
                          <tr>
                            <td width="116" scope="col"><label class="control-label" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">IC/Passport</label></td>
                            <th width="477" align="left" scope="col"><span class="controls">
                              <input name="passport" type="text"   value="<?php echo !empty($passport)?$passport:'';?>">
                            
                            <?php if (!empty($passportError)): ?>
                              <span><?php echo $passportError;?></span>
                              <?php endif; ?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls"></div>
                      </div>
					  
					  <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group">
                        <table width="600" border="0">
                          <tr>
                            <td width="115" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif" scope="col">Room Type</td>
                            <th width="475" align="left" scope="col"><span class="controls">
                              <select name="roomtype" id="roomtype">
                                <option value="Single">Single</option>
                                <option value="Superior">Superior</option>
                                <option value="Deluxe">Deluxe</option>
                              </select>
                            
                            <?php if (!empty($roomtypeError)): ?>
                              <span class="help-inline"><?php echo $roomtypeError;?></span>
                              <?php endif; ?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls"></div>
                      </div>
					  					  
					  <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group">
                        <table width="600" border="0">
                          <tr>
                            <td width="115" scope="col"><label class="control-label" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Check-in Date</label></td>
                            <th width="475" align="left" scope="col"><span class="controls">
                              <input name="dor" type="text" id="dor" value="<?php echo !empty($dor)?$dor:'';?>">
                            
                            <?php if (!empty($dorError)): ?>
                              <span class="help-inline"><?php echo $dorError;?></span>
                              <?php endif;?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls">
                        </div>
                      </div>
					  
					  <form class="form-horizontal" action="create_reservation.php" method="post">
                      <div class="control-group">
                        <table width="600" border="0">
                          <tr>
                            <td width="115" scope="col"><label class="control-label" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Check-out Date</label></td>
                            <th width="475" align="left" scope="col"><span class="controls">
                              <input name="dco" type="text" id="dco"  value="<?php echo !empty($dco)?$dco:'';?>">
                            <?php if (!empty($dcoError)): ?>
                              <span class="help-inline"><?php echo $dcoError;?></span>
                              <?php endif;?>
                            </span></th>
                          </tr>
                        </table>
                        <div class="controls"></div>
                      </div>
                     
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a href="reservation_mgmt2.php" class="btn" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>