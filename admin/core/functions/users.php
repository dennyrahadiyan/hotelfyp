<?php
//if the comparison is matched, it will return 1 THEN IF IT IS EQUAL TO 1 THEN RETURN TRUE

//check availability while creating reservation
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
		room_num = '".$_POST['room_num']."',
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
					'".$_POST['fullname']."',
					'".$_POST['contactno']."',
					'".$_POST['passport']."',
					'".$_POST['roomtype']."',
					$roomprice,
					'".$_POST['dor']."',
					'".$_POST['dco']."',
					sysdate(),
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

function user_reservation2 ()
{
// Connecting, selecting database
$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully<br>';
mysql_select_db('hotel_reservation5') or die('Could not select database');
//echo 'Selected system database - user successfully<br>';

if($_POST['roomtype'] == "Deluxe"){
    $roomprice = 300;
	}
else if($_POST['roomtype'] == "Superior"){
    $roomprice = 200;
	}
else{
    $roomprice = 100;
	}

// Store query in variable
$query = "INSERT INTO reservation (user_id,fullname,contactno,passport,roomtype,roomprice,num_of_rooms,dor,dco,bookingdate,length_of_stay)
					VALUES
					(
					'".$_SESSION['user_id']."',
					'".mysql_real_escape_string($_POST['fullname'])."',
                    '".mysql_real_escape_string($_POST['contactno'])."',
                    '".mysql_real_escape_string($_POST['passport'])."',
                    '".mysql_real_escape_string($_POST['roomtype'])."',
					$roomprice,
					'".mysql_real_escape_string($_POST['num_of_rooms'])."',
                    '".mysql_real_escape_string($_POST['dor'])."',
                    '".mysql_real_escape_string($_POST['dco'])."',
					NOW(),
					DATEDIFF(dco,dor)
					)";

// Performing SQL query
$result = mysql_query($query) 
or die('Query failed: ' . mysql_error());

//echo "Success inserting record!";

// Closing connection
mysql_close($link);

header("Location:reservation.php?success");
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
	
	//insert the inputed data from user to database
	mysql_query("INSERT INTO `payment` ($fields) VALUES ($data)");
}

function user_count() 
{
	//query from user where active = 1
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1 "),0);
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
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/[a-zA-Z0-9]/", $_POST['reservation_id'])){
  $reservation_id=$_POST['reservation_id'];
  //connect  to the database
  $sql="SELECT  reservation_id, fullname, contactno, passport, roomtype, dor, dco FROM reservation WHERE reservation_id LIKE '%" . $reservation_id . "%' OR fullname LIKE '%" . $reservation_id ."%' OR passport LIKE '%" . $reservation_id ."%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $reservation_id=$row['reservation_id'];
          $fullname=$row['fullname'];
		  $contactno=$row['contactno'];
		  $passport=$row['passport'];
          $roomtype=$row['roomtype'];
		  $dor=$row['dor'];
		  $dco=$row['dco'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li> <h1> Reservation Number: " . $reservation_id . " </h1><br/> Reservation Name: " . $fullname . " <br/> Contact No.: " . $contactno . " <br/> Passport: " . $passport . " <br/> Room Type: " . $roomtype . " <br/>  Check-in date: " . $dor . " <br/> Check-out date: " . $dco . "</li>\n";
  echo "<td><a href='change2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/change.png" width="130" height="25"  alt=""/></a>  <?php
  echo "<td><a href='delete2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/cancel.png" width="130" height="25"  alt=""/></a>  <?php
  echo "</ul>";
		}
	}
  else{
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
  //connect  to the database
  $sql="SELECT  reservation_id, fullname, contactno, passport, roomtype, num_of_rooms, dor, dco FROM reservation WHERE reservation_id LIKE '%" . $reservation_id . "%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $reservation_id=$row['reservation_id'];
          $fullname=$row['fullname'];
		  $contactno=$row['contactno'];
          $roomtype=$row['roomtype'];
		  $num_of_rooms=$row['num_of_rooms'];
		  $dor=$row['dor'];
		  $dco=$row['dco'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li> <h1> Reservation Number: " . $reservation_id . " </h1><br/> Reservation Name: " . $fullname . " <br/> Contact No.: " . $contactno . " <br/> Room Type: " . $roomtype . " <br/> No. of Rooms: " . $num_of_rooms . " <br/> Check-in date: " . $dor . " <br/> Check-out date: " . $dco . "</li>\n";
  echo "<td><a href='checkin.php?reservation_id=".$row['reservation_id']."'>Check-in</a></td>\n";
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
		echo "<td><a href='change2.php?reservation_id=".$row['reservation_id']."'>"; ?><img src="button/change.png" width="130" height="25"  alt=""/></a>  <?php
		
  echo "</tr>\n";
  }


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
}

function reservation_receipt()
  {


// Store query in variable
$query = "SELECT reservation_id, fullname, contactno, roomtype, num_of_rooms, dor, dco FROM reservation ORDER BY reservation_id DESC LIMIT 1";

// Performing SQL query
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

  echo "</tr>\n";
while ($row = mysql_fetch_assoc($result)) {
$reservation_id=$row['reservation_id'];
          $fullname=$row['fullname'];
		  $contactno=$row['contactno'];
          $roomtype=$row['roomtype'];
		  $num_of_rooms=$row['num_of_rooms'];
		  $dor=$row['dor'];
		  $dco=$row['dco'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li> <h1> Reservation Number: " . $reservation_id . " </h1><br/> Reservation Name: " . $fullname . " <br/> Contact No.: " . $contactno . " <br/> Room Type: " . $roomtype . " <br/> No. of Rooms: " . $num_of_rooms . " <br/> Check-in date: " . $dor . " <br/> Check-out date: " . $dco . "</li>\n";
  echo "</ul>";
  

  }


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
}


?>