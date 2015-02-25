<script type="text/javascript">

/***********************************************

* JavaScript Image Clock- by JavaScript Kit (www.javascriptkit.com)
* This notice must stay intact for usage
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more

***********************************************/

var imageclock=new Object()
	//Enter path to clock digit images here, in order of 0-9, then "am/pm", then colon image:
	imageclock.digits=["c0.gif", "c1.gif", "c2.gif", "c3.gif", "c4.gif", "c5.gif", "c6.gif", "c7.gif", "c8.gif", "c9.gif", "cam.gif", "cpm.gif", "colon.gif"]
	imageclock.instances=0
	var preloadimages=[]
	for (var i=0; i<imageclock.digits.length; i++){ //preload images
		preloadimages[i]=new Image()
		preloadimages[i].src=imageclock.digits[i]
	}

	imageclock.imageHTML=function(timestring){ //return timestring (ie: 1:56:38) into string of images instead
		var sections=timestring.split(":")
		if (sections[0]=="0") //If hour field is 0 (aka 12 AM)
			sections[0]="12"
		else if (sections[0]>=13)
			sections[0]=sections[0]-12+""
		for (var i=0; i<sections.length; i++){
			if (sections[i].length==1)
				sections[i]='<img src="'+imageclock.digits[0]+'" />'+'<img src="'+imageclock.digits[parseInt(sections[i])]+'" />'
			else
				sections[i]='<img src="'+imageclock.digits[parseInt(sections[i].charAt(0))]+'" />'+'<img src="'+imageclock.digits[parseInt(sections[i].charAt(1))]+'" />'
		}
		return sections[0]+'<img src="'+imageclock.digits[12]+'" />'+sections[1]+'<img src="'+imageclock.digits[12]+'" />'+sections[2]
	}

	imageclock.display=function(){
		var clockinstance=this
		this.spanid="clockspan"+(imageclock.instances++)
		document.write('<span id="'+this.spanid+'"></span>')
		this.update()
		setInterval(function(){clockinstance.update()}, 1000)
	}

	imageclock.display.prototype.update=function(){
		var dateobj=new Date()
		var currenttime=dateobj.getHours()+":"+dateobj.getMinutes()+":"+dateobj.getSeconds() //create time string
		var currenttimeHTML=imageclock.imageHTML(currenttime)+'<img src="'+((dateobj.getHours()>=12)? imageclock.digits[11] : imageclock.digits[10])+'" />'
		document.getElementById(this.spanid).innerHTML=currenttimeHTML

	}


</script>
<div class="widget">
<!--
Current Local Time in GMT+8 <div id="txt"></div>
-->

<!-- <body onload="startTime()" > -->
</br>	
	<div style="border-top:1px solid #ddd;"></div>
    <h2 align="middle">Administrator Login</h2>
	
        <div class="inner">
            <form action="login_admin.php" method="post">
				<ul id="login">
					<li>
						Username: <br>
						<input type="text" name="adminname">
					</li>
					<li>
						Password: <br>
						<input type="password" name="adminpwd">
					</li>
					<li>
						<input type="submit" value="Log in">
					</li>
					
					<li>
					<script type="text/javascript">

new imageclock.display()

    </script>
					</li>
					<li>
					<?php
		 echo "<font COLOR=black>";
		 echo date("D M d, Y "); 
		 echo "</font>";
		?>
		</li>
				</ul>
			</form>
        </div>
</div>


<script>
/*
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
*/
</script>
