<?php
session_start();
if(!isset($_POST["act"])&&!isset($_GET["invite"])){
header("Location:invitation.php");
exit();
}
if(isset($_GET["invite"])){
	if(!isset($_SESSION['invite'])){
		header("Location:invitation.php");
		exit();
	}
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
	<img src="/images/share.jpg" class="shareimg" />
	<div data-role="page" id="guest">
			<?php include'menu.php';?>
			<a class="invite_ticket" href="php/down.php?type=jpg&fic=<?php echo urlencode("/ws/".$img);?>" download="einvitations.jpg" data-ajax="false"><img src="/ws/<?php echo $img;?>" class="img-invitation"></a>
			<div class="btn-invitation">
				<a href="baidumap/index.html" class="btn" id="save-wechat" data-ajax="false">立即前往</a>
				<!--<a href="php/down.php?type=jpg&fic=<?php echo urlencode("/ws/".$img);?>" download="einvitations.jpg" class="btn" id="save-wechat" data-ajax="false">长按保存</a>-->
			</div>
	</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "sitereveal/confirmation.php"]);
</script>
</body>

</html>