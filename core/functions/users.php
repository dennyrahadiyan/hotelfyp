<?php
//if the comparison is matched, it will return 1 THEN IF IT IS EQUAL TO 1 THEN RETURN TRUE

//reservation.php

function check_availability ()
{

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query="SELECT
    room.room_num
FROM
    room
WHERE
  roomtype = '".mysql_real_escape_string($_POST['roomtype'])."' AND
  room.room_num not in 
  (
    SELECT
      room_booked.room_num
    FROM
      room_booked
    WHERE
      (room_booked.dor<='".mysql_real_escape_string($_POST['dor'])."' and room_booked.dco>='".mysql_real_escape_string($_POST['dor'])."')
      OR
      (room_booked.dor<'".mysql_real_escape_string($_POST['dco'])."' and room_booked.dco>='".mysql_real_escape_string($_POST['dco'])."')
      OR
      (room_booked.dor>='".mysql_real_escape_string($_POST['dor'])."' and room_booked.dco<'".mysql_real_escape_string($_POST['dco'])."')
   )
ORDER BY
    RAND()
LIMIT 0, 1
";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

while($row=mysql_fetch_array($result)){
$room_num=$row['room_num'];
}
if ($room_num == 0)
	{
	header("Location:notavailable.php");
	}
	
	else
	{
	user_reservation ();
	}

// Closing connection
mysql_close($link);

}

//check availability room while change reservation
function check_availability_update ()
{

// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

// Store query in variable
$query="SELECT
    room.room_num
FROM
    room
WHERE
  roomtype = '".mysql_real_escape_string($_POST['roomtype'])."' AND
  room.room_num not in 
  (
    SELECT
      room_booked.room_num
    FROM
      room_booked
    WHERE
      (room_booked.dor<='".mysql_real_escape_string($_POST['dor'])."' and room_booked.dco>='".mysql_real_escape_string($_POST['dor'])."')
      OR
      (room_booked.dor<'".mysql_real_escape_string($_POST['dco'])."' and room_booked.dco>='".mysql_real_escape_string($_POST['dco'])."')
      OR
      (room_booked.dor>='".mysql_real_escape_string($_POST['dor'])."' and room_booked.dco<'".mysql_real_escape_string($_POST['dco'])."')
   )
ORDER BY
    RAND()
LIMIT 0, 1
";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

while($row=mysql_fetch_array($result)){
$room_num=$row['room_num'];
}
if ($room_num == 0)
	{
	header("Location:notavailable.php");
	}
	
	else
	{
	update_reservation ();
	}

// Closing connection
mysql_close($link);

}

function user_reservation ()
{
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

//determine roomprice based on roomtype
if($_POST['roomtype'] == "Deluxe"){
    $roomprice = 280;
	}
else if($_POST['roomtype'] == "Superior"){
    $roomprice = 200;
	}
else{
    $roomprice = 150;
	}

// Store query in variable
$query = "INSERT INTO reservation (user_id,fullname,contactno,passport,roomtype,roomprice,dor,dco,bookingdate,length_of_stay,payment)
					VALUES
					(
					'".$_SESSION['user_id']."',
					'".mysql_real_escape_string($_POST['fullname'])."',
                    '".mysql_real_escape_string($_POST['contactno'])."',
                    '".mysql_real_escape_string($_POST['passport'])."',
                    '".mysql_real_escape_string($_POST['roomtype'])."',
					$roomprice,
                    '".mysql_real_escape_string($_POST['dor'])."',
                    '".mysql_real_escape_string($_POST['dco'])."',
					NOW(),
					DATEDIFF(dco,dor),
					(roomprice*length_of_stay)
					)";

// Performing SQL query
$result = mysql_query($query) 
or die('Query failed: ' . mysql_error());

//echo "Success inserting record!";

// Closing connection
mysql_close($link);

header("Location:reservation.php?success");
}

function payment ()
{
// Store query in variable
$query = "INSERT INTO payment (reservation_id,user_id,bank_in_from,acc_no,holder_name)
					VALUES
					(
					'".mysql_real_escape_string($_POST['reservation_id'])."',
					'".$_SESSION['user_id']."',
					'".mysql_real_escape_string($_POST['bank_in_from'])."',
                    '".mysql_real_escape_string($_POST['acc_no'])."',
                    '".mysql_real_escape_string($_POST['holder_name'])."',
					)";

// Performing SQL query
$result = mysql_query($query) 
or die('Query failed: ' . mysql_error());

//echo "Success inserting record!";

// Closing connection
mysql_close($link);

header("Location:reservation.php?success");
}

function update_reservation ()
{
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

//determine roomprice based on roomtype
if($_POST['roomtype'] == "Deluxe"){
    $roomprice = 280;
	}
else if($_POST['roomtype'] == "Superior"){
    $roomprice = 200;
	}
else{
    $roomprice = 150;
	}
	
// Store query in variable
$query="UPDATE reservation
	SET fullname = '".$_POST['fullname']."',
		contactno = '".$_POST['contactno']."',
		passport = '".$_POST['passport']."',
		roomtype = '".$_POST['roomtype']."',
		roomprice = $roomprice,

		dor = '".$_POST['dor']."',
		dco = '".$_POST['dco']."',
		length_of_stay = DATEDIFF (dco,dor),
		payment = (roomprice*length_of_stay)
	
	WHERE reservation_id = '".$_POST['reservation_id']."'
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


// Closing connection
mysql_close($link);
header("Location:change2.php?success");
}

function payment_status ()
{
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');

	
// update
$query="UPDATE reservation
	SET payment_status = 'Paid'
	WHERE reservation_id = ".$_POST['reservation_id']."
	";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


// Closing connection
mysql_close($link);

}

//register.php
function register_user($register_data)
{	
	//Run each array element in a user-defined function
	array_walk($register_data, 'array_sanitize');
	//to protect sql injection
	$register_data['password'] = md5($register_data['password']);
	
	//implode returns a string from the elements of an array
	//e.g. username,password,first name,last name,email
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	
	//data is everything that user inputs
	$data ='\'' . implode('\', \'', $register_data) . '\'';
	
	//insert the inputed data from user to database
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

//payment.php
function reservation_payment($payment_data)
{	
	//Run each array element in a user-defined function
	array_walk($payment_data);

	
	//implode returns a string from the elements of an array
	$fields = '`' . implode('`, `', array_keys($payment_data)) . '`';
	
	//data is everything that user inputs
	$data ='\'' . implode('\', \'', $payment_data) . '\'';
	
	//insert the input data from user to database
	mysql_query("INSERT INTO `payment` ($fields) VALUES ($data)");
}



//$user_data now is an array
function user_data($user_id)
{
	$data = array();
	$user_id = (int)$user_id;
	
	//Returns the number of arguments passed to the function_func_num_args
	//simply to say to know how many parameter passed through this function
	//there are 9
	$func_num_args = func_num_args();
	//$func_get_args = func_get_args();
	
	if($func_num_args > 1 )
	{
		//unset($func_get_args[0]);
		
		//$fields = '`' . implode('`, `',$func_get_args) . '`';
		//$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id "));
		$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `user_id` = '$user_id'"));
		
		return $data;
	}
}



//logged_in()
function logged_id()
{
	return (isset($_SESSION['user_id'])) ? true : false; 
}


//function to check user exist
//select count('user_id') is to check if the user_id = 1 then return true 
function user_exists($username)
{
	$username = sanitize($username);
	//$query = mysql_query("SELECT COUNT....");
	//return (mysql_result($query,0) == 1 )? true : false;
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' "), 0) ==1) ? true : false;
}

function email_exists($email)
{
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' "), 0) ==1) ? true : false;
}

function reservation_paid($reservation_id)
{
	$reservation_id = sanitize($reservation_id);
	return (mysql_result(mysql_query("SELECT COUNT(`transaction_id`) FROM `payment` WHERE `reservation_id` = '$reservation_id' "), 0) ==1) ? true : false;
}

function change_password($user_id,$password)
{
	$user_id = (int) $user_id;
	$password = md5($password);
	
	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id");
}

function user_active($username)
{
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = '1' "), 0) ==1) ? true : false;
}


function user_id_from_username($username)
{    
	$username = sanitize($username);
	// 0 = first row
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username' "),0, 'user_id');
}

function login($username,$password)
{
	//use the function from above
	$user_id = user_id_from_username($username);

	$username = sanitize($username);
	$password = md5($password);
	
	//if true returns user_id else return false
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password' "  ),0) == 1) ? $user_id : false;
}

function login_admin($adminname,$adminpwd)
{
	$user_id = user_id_from_username($adminname);
	$adminname = sanitize($adminname);
	$adminpwd = md5($adminpwd);
	
	//if true returns user_id else return false
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `admin` WHERE `adminname` = '$adminname' AND `adminpwd` = '$adminpwd' "  ),0) == 1) ? $user_id : false;
}

function reservation_search()
{
  $user = $_SESSION['user_id'];

  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/[0-9]/", $_POST['reservation_id'])){
  $reservation_id=$_POST['reservation_id'];
  //connect  to the database
  $sql="SELECT  reservation_id, user_id, fullname, contactno, passport, roomtype, dor, dco, length_of_stay, room_num, payment, status, payment_status FROM reservation WHERE reservation_id LIKE '%" . $reservation_id . "%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $reservation_id=$row['reservation_id'];
		  $user_id=$row['user_id'];
          $fullname=$row['fullname'];
		  $contactno=$row['contactno'];
		  $passport=$row['passport'];
          $roomtype=$row['roomtype'];
		  $dor=$row['dor'];
		  $dco=$row['dco'];
		  $length_of_stay=$row['length_of_stay'];
		  $payment=$row['payment'];
		  $room_num=$row['room_num'];
		  $status=$row['status'];
		  $payment_status=$row['payment_status'];
		  
  //-display the result of the array
    		if ($user == $user_id){
  echo "<ul>\n";
  
  echo "<table width='300' border='0'>";
  echo "<tr>";
  echo "<th width='173' scope='col'>Reservation No: </th>";
  echo "<th width='144' scope='col'>$reservation_id</th>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>Full Name</td>";
  echo "<td width='100' scope='col'>$fullname</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>Contact No.</td>";
  echo "<td width='100' scope='col'>$contactno</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>IC/Passport</td>";
  echo "<td width='100' scope='col'>$passport</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>Roomtype</td>";
  echo "<td width='100' scope='col'>$roomtype</td>";
  echo "</tr>";
  
  
  echo "<tr>";
  echo "<td>Check-in Date</td>";
  echo "<td width='100' scope='col'>$dor</td>";
  echo "</tr>";  
  
  echo "<tr>";
  echo "<td>Check-out Date</td>";
  echo "<td width='100' scope='col'>$dco</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>Length of Stay</td>";
  echo "<td width='100' scope='col'>$length_of_stay</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td>Payment</td>";
  echo "<td width='100' scope='col'>$payment_status</td>";
  echo "</tr>";
  
  if ($room_num == 0)
	  {
	  echo "";
	  }
  
  else
	  {
	  echo "<tr>";
	  echo "<td>Room No.</td>";
	  echo "<td width='100' scope='col'>$room_num</td>";
	  echo "</tr>";
	  }
  echo "</table>";
  
	echo	"<h1>Payment: RM " . $payment . "</h1></li><br>\n";
			if ($status == 'Checked-in')
			{
			  echo "<td><h2>You have been checked-in</h2></td><br>\n";
			  ?>
			  <a href="print.php?reservation_id=<?php echo $reservation_id; ?>"><img src="img/print.gif" width="42" height="47"  alt=""/></a>
			  <?php
				if ($room_num == 0)
				{
				echo "<td><a href='getroom.php?reservation_id=".$reservation_id."'>"; ?><img src="button/getroom.png" width="100" height="25"  alt=""/></a>  <?php
				}
				
				else {
				echo"";
				}
				  

				  echo "</ul>";
			}
			
			else
			{
			if($payment_status == 'Paid')
				{
					echo "";
				}
				
				else{
							echo "<td><a href='payment2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/payment.png" width="130" height="25"  alt=""/></a>  <?php
			echo "<td><a href='change2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/change.png" width="130" height="25"  alt=""/></a>  <?php
			  echo "</ul>";
				}

			 }
			  
			  }
			  
		 else {
		 echo "Reservation not found! Or maybe the reservation not made by you!";
			   }
				
		}
	}
  else
  {
  echo  "<p>Enter your reservation!!</p>";
			}
		}
	}
  }
  
function checkin_search()
{
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/[a-zA-Z0-9]/", $_POST['reservation_id'])){
  $reservation_id=$_POST['reservation_id'];
  $row_reservation_id=$row['reservation_id'];
  $user_id=$_SESSION['user_id'];
  //connect  to the database
  $sql="SELECT  reservation_id FROM confirmed_payment WHERE reservation_id LIKE '%" . $reservation_id . "%' AND user_id = $user_id AND checkin_status = 'Pending'" ;
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set

  while($row=mysql_fetch_array($result)){
          $reservation_id=$row['reservation_id'];
          
  //-display the result of the array
  echo "<ul>\n";
  echo "<li><br/>You may begin to check-in now</li>\n";
  echo "<td><a href='checkin3.php?reservation_id=".$row['reservation_id']."'>";?><img src="button/checkin2.png" width="130" height="25"  alt=""/></a>  <?php
  echo "</ul>";
		}
		
	}
	 
  else{
 
  echo  "<p>Enter your reservation!!</p>";
			}
			
		}
	}
	
  }
  
function view_reservation()
  {


// Store query in variable
$query = "SELECT * FROM reservation ORDER BY reservation_id DESC LIMIT 1";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


    	echo "<td><h1> Your Reservation Number is ";

		
  echo "</tr>\n";
while ($row = mysql_fetch_assoc($result)) {
  echo "<tr>\n";
    	echo "<td>".$row['reservation_id']."</td></h1>";
		echo "<td>Fullname: ".$row['fullname'];echo"<br>";
		echo "<td>Room type: ".$row['roomtype'];echo"<br>";
		echo "<td>Date in: ".$row['dor'];echo"<br>";
		echo "<td>Date out: ".$row['dco'];echo"<br>";echo"<br>";
		echo "<h1><td>Total Payment: RM ".$row['payment'];echo"<br></h1>";
		echo "<br><br><br>";
		echo "<td><a href='screenshot.php'>";?><img src="button/snapshot.png" width="130" height="25"  alt=""/></a>  <?php
		echo "<td><a href='payment2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/payment.png" width="130" height="25"  alt=""/></a>  <?php
		echo "<td><a href='change2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/change.png" width="130" height="25"  alt=""/></a>  <?php

		
  echo "</tr>\n";
  }


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
}

function reservation_count() 
{
	$user_id = $_SESSION['user_id'];
	//query from pending reservations
	return mysql_result(mysql_query("SELECT COUNT(`reservation_id`) FROM `confirmed_payment` WHERE `user_id` = $user_id AND `checkin_status` = 'Pending' "),0);
}

?>