<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>

<p>Your screenshot has been saved!</br>

You can click<a href="download_png.php?download_file=some_file.png" style="color:red;"> HERE</a> to download the screenshot</p>
</br>
<!--
<img src="/lr/screenshot.png" height="700" width="900"> 
-->


<?php
$img = imagegrabscreen();
imagepng($img, 'screenshot.png');
?>

<?php
$Browser = new COM('InternetExplorer.Application');
$Browserhandle = $Browser->HWND;
$Browser->Visible = true;
$Browser->Fullscreen = true;
//$Browser->Navigate('http://www.stackoverflow.com');

while($Browser->Busy){
  com_message_pump(1000);
}

$img = imagegrabwindow($Browserhandle, 0);
$Browser->Quit();
imagepng($img, 'screenshot.png');
?>



<?php 

include 'includes/overall/footer.php'; 
?>