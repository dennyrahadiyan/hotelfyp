<?php 
include 'core/init.php';
include 'includes/overall/header.php' ;

?>

<h1>
<font face="verdana" size="6" color="red">
	<center>
		Hotel & Resort
	</center>
</font>
</h1>
<h2>
<center style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
  <p>Welcome to Malaysia's Wonderland</p>
</center>
</h2>


<script type="text/javascript">
<!-->
var image1=new Image()
image1.src="1.jpg"
var image2=new Image()
image2.src="2.jpg"
var image3=new Image()
image3.src="3.jpg"
//-->
</script>

<script type="text/javascript">
<!--
var step=1
function slideit(){
document.images.slide.src=eval("image"+step+".src")
if(step<3)
step++
else
step=1
setTimeout("slideit()",5000)
}
slideit()
//-->
</script>


<div class="photos"> 
    <img src="1.jpg" width="260" height="260"/> 
    <img src="2.jpg" width="260" height="260"/> 
    <img src="3.jpg" width="260" height="260" /> 
</div>


<?php include 'includes/overall/footer.php' ;?>

