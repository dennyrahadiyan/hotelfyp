<aside>
	<?php
	//after login in the login framework should be removed which redirect to loggedin.php
	if(logged_id() === true)
	{
		include 'includes/widgets/loggedin.php';
		include 'includes/widgets/reservation_count.php';	
	}
	//not successful login will display the same as before login
	else
	{
		include 'includes/widgets/login.php'; 
	}

	?> 
</aside>