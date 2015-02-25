
<?php
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/[a-zA-Z0-9]/", $_POST['reservation_id'])){
  $reservation_id=$_POST['reservation_id'];
  //connect  to the database
  $db=mysql_connect  ("localhost", "root",  "") or die ('Cannot connect to the database  because: ' . mysql_error());
  //-select  the database to use
  $mydb=mysql_select_db("hotel_reservation5");
  //-query  the database table
  $sql="SELECT  reservation_id, reservation_fname, reservation_lname, contactno, roomtype, num_of_rooms, dor, dco FROM reservation WHERE reservation_id LIKE '%" . $reservation_id . "%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $reservation_id=$row['reservation_id'];
          $reservation_fname=$row['reservation_fname'];
		  $reservation_lname=$row['reservation_lname'];
		  $contactno=$row['contactno'];
          $roomtype=$row['roomtype'];
		  $num_of_rooms=$row['num_of_rooms'];
		  $dor=$row['dor'];
		  $dco=$row['dco'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li> <h1> Reservation Number: " . $reservation_id . " </h1><br/> Reservation Name: " . $reservation_fname . " " . $reservation_lname . " <br/> Contact No.: " . $contactno . " <br/> Room Type: " . $roomtype . " <br/> No. of Rooms: " . $num_of_rooms . " <br/> Check-in date: " . $dor . " <br/> Check-out date: " . $dco . "</li>\n";
  echo "<td><a href='zzz.php?id=".$row['reservation_id']."'>Update</a></td>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>
