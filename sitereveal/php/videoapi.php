<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
include("ws.php"); 
$data["act"]="random_video"; 
$einvitations = wsCall($data);
header('Content-type: application/json');
echo json_encode($einvitations)
exit;
?>