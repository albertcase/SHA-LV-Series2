<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
include("ws.php"); 
$_POST["act"]="random_video"; 
$einvitations = wsCall($_POST);
//header('Content-type: application/json');
echo "<pre>";
print_r($einvitations);
exit;
?>