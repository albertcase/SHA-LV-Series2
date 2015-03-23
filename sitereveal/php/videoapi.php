<?php
include("ws.php"); 
$data["act"]="random_video"; 
$einvitations = wsCall($data);
header('Content-type: application/json');
echo json_encode($einvitations);
exit;
?>