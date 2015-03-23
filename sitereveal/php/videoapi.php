<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
include("php/ws.php"); $_POST["act"]="random_video"; $einvitations = wsCall($_POST);

echo $einvitations;
exit;
?>