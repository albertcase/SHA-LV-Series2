<?php
include("ws.php"); $_POST["act"]="random_video"; $einvitations = wsCall($_POST);
header('Content-type: application/json');
echo $einvitations;
exit;
?>