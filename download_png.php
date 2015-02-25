<?php
$file = "screenshot.png";
header('Content-Length: ' . filesize($file));
header("Content-type: application/png"); 
header( "Content-Disposition: attachment; filename=".basename($file));
@readfile($file) 
?>