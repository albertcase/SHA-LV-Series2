<?php
//ini_set("display_errors",1);
//error_reporting(E_ALL);
include("ws.php"); 
$data["act"]="random_video"; 
$einvitations = wsCall($data);
echo json_encode($einvitations);
exit;
?>