<aside>
	<?php
	//after login in the login framework should be removed which redirect to loggedin.php
	if(logged_id() === true)
	{
		include 'includes/widgets/loggedin.php';
	}
	//not successful login will display the same as before login
	else
	{
		include 'includes/widgets/login_admin.php'; 
	}
	
	?> 
</aside>