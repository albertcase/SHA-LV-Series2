<?php
include("php/ws.php"); $_POST["act"]="random_video"; $einvitations = wsCall($_POST);

echo $einvitations;
exit;
?>