<?php
session_start();
if(!isset($_POST["act"])&&!isset($_GET["invite"])){
header("Location:invitation.php");
exit();
}
if(isset($_GET["invite"]){
	$img=$_SESSION["invite"];
}else{
	include("php/ws.php"); $_POST["act"]="einvitations"; $_POST["tel"]=$_POST["phone"]; $einvitations = wsCall($_POST);
	$_SESSION["invite"]=$img=$einvitations->img;
}
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Louis Vuitton</title>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<style type="text/css">
		#guest{ overflow: hidden; }
	</style>
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body class="home confirmation">
	<div data-role="page" id="guest">
			<?php include'menu.php';?>
			<a class="invite_ticket" href="php/down.php?type=jpg&fic=<?php echo urlencode("/ws/".$img);?>" download="einvitations.jpg" data-ajax="false"><img src="/ws/<?php echo $img;?>" class="img-invitation"></a>
			<div class="btn-invitation">
				<a href="baidumap/index.html" class="btn" id="save-wechat" data-ajax="false">立即前往</a>
				<!--<a href="php/down.php?type=jpg&fic=<?php echo urlencode("/ws/".$img);?>" download="einvitations.jpg" class="btn" id="save-wechat" data-ajax="false">长按保存</a>-->
			</div>
	</div>
</body>

</html>