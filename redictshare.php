<?php
session_start();
$_SESSION['sharestatus']=1;
header("Location:share.php?fic=".$_GET["fic"]);
exit;
?>