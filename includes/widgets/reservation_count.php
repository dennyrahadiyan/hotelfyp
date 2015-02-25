<div class="widget">
	<div style="border-top:1px solid #ddd;"></div>
	<h2 align="middle">Notification</h2>
	<div class = "inner">
	<?php
	//set the variable equals to the function
	$reservation_count = reservation_count();
	// !=1 
	//this function is to put an "s" if the user_count determines the user is more than 1 or not
	$suffix = ($reservation_count > 1) ? 's' : '';
	?>
	<?php if ($reservation_count == 0)
			{
			echo "";
			}
			else {?>
			<font color="red"><a href=notification.php><?php echo reservation_count(); ?></a> of your reservation<?php echo $suffix;?> ready to check-in.</font>
		<?php }?>
	</div>
</div>