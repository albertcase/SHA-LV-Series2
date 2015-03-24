<?php
session_start();
if(isset($_SESSION['sharestatus'])){
	$status=1;
	unset($_SESSION['sharestatus']);
}else{
	$status=0;
}
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Louis Vuitton</title>
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<script src="js/lib/shake/shake.js"></script>
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body class="video">
<img src="/images/share.jpg" class="shareimg" />

	<script type="text/javascript">
		
		window.onload = function() {
			var status='<?php echo $status;?>';
			if(status==0){
				$(".layer-step5").hide();
			}else{
				$(".layer-step5").show();
			}
			$(".layer-step5").on( "click", function(e) {
				$(".layer-step5").hide();
			});	

		};
	</script>	




<div data-role="page" id="preview">
	<div class="layer-step5"></div>
	<a class="back-btn" href="video.php" data-ajax="false">back</a>
	<video width='250' height='360' id="share-video" controls='controls' poster='images/video/placeholder-video.jpg'><source src='<?php echo "".$_GET["fic"];?>' type='video/mp4' /></video>
	<div class="liens-home" >
	<a href="video.php#visualisation" class="btn" data-ajax="false">制作微视频</a>
	<a href="invitation.php" class="btn" data-ajax="false">申领邀请函</a>
	</div>
</div>


<script type="text/javascript">
	$(function(){
		$(document).ready(function(){
			$("#share-video").height($(window).height()*0.57);
		});
			
	});
</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "sitereveal/share.php"]);
</script>
</body>
</html>