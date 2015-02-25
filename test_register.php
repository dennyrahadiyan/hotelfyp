<?php
     
    require 'core/init.php';
	require 'includes/overall/header.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
		$usernameError = null;
		$passwordError = null;
        $first_nameError = null;
        $last_nameError = null;
        $passportError = null;
		$emailError = null;
         
        // keep track post values
		$username = $_POST['username'];
		$password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
		$passport = $_POST['passport'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
        
         
        // validate input
        $valid = true;
        if (empty($first_name)) {
            $first_nameError = 'Please enter First Name';
            $valid = false;
        }
		
		if (empty($last_name)) {
            $last_nameError = 'Please enter Last Name';
            $valid = false;
        }
		
		if (empty($passport)) {
            $passportError = 'Please enter IC/Passport';
            $valid = false;
        }
		
	
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
       
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (first_name,last_name,passport,gender,email) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($first_name,$last_name,$passport,$gender,$email));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($first_nameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="first_name" type="text"  placeholder="First Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($last_nameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="last_name" type="text"  placeholder="First Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($passportError)?'error':'';?>">
                        <label class="control-label">IC/Passport</label>
                        <div class="controls">
                            <input name="passport" type="text"  placeholder="IC/Passport" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                     
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>