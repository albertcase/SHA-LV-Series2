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
	<title>路易威登“系列二”线上展览，点击进入，体验创新数字之旅</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/lib/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1" />
<script>
//--start
//baidu tracking
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
//pv
_hmt.push(['_trackPageview', "index.php"]);
//--end
</script>

</head>
<body>
<img src="/images/icon.jpg" style="position:absolute; opacity:0;" />
	<video  controls='controls' poster='images/video/placeholder-video.jpg' style="display:block; margin: 0px auto; text-align:center; width:auto; height:100%;" id="teaser-video">
		<source src='<?php echo $myvideo; ?>' type='video/mp4' />
	</video>

<script>
	$(function(){
		$(document).ready(function(){
			$("#teaser-video").height($(window).height());
		});

			
	});
</script>
<script>
function GetQueryString(name){
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}

if(GetQueryString("hmsr")){
//	window.history.pushState({}, 'series 2', "http://www.seriescampaign.com");
}
</script>
</body>

</html>
