<?php
//--start
require_once 'lib/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
if($deviceType == "computer"){
	//PC redirect
	$_GET['hmsr'] = isset($_GET['hmsr']) ? "PC-" . $_GET['hmsr'] : "";
	if($_GET['hmsr']==""){
		header("Location: /pc/");
		exit;
	}
	header("Location: /pc/?".http_build_query($_GET));
	exit;
}
//--end
?>
<?php include("php/teaser.php"); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Louis Vuitton</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/lib/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />		
</head>
<body>
<img src="/images/share.jpg" class="shareimg" />
	<video  controls='controls' poster='images/video/placeholder-video.jpg' style="display:block; margin: 10px auto; text-align:center; width:100%;" id="teaser-video">
		<source src='<?php echo $myvideo; ?>' type='video/mp4' />
	</video>

	<div class="liens-home home-part" >
		<a href="index2.php">进入展览</a>
	</div>

	<a href="http://www.louisvuitton.cn" target="_blank" class="lien-vuitton">www.louisvuitton.cn</a>

<script>
	$(function(){
		$(document).ready(function(){
			$("#teaser-video").height($(window).height()*0.7);
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
_hmt.push(['_trackPageview', "index.php"]);
</script>
</body>

</html>