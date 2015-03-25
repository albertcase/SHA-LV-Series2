<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>路易威登“系列二”线上展览，点击进入，体验创新数字之旅</title>
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<script src="js/lib/swipe/jquery.touchSwipe.min.js"></script>
	<script src="js/lib/parallax/parallax.js"></script>
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body class="home">
	<img src="/images/share.jpg" class="shareimg" />
<div data-role="page" id="introduction">

	<div role="main" class="ui-content">
		<?php include'menu.php';?>
		<img src="./images/intro.png" style="width:70%; height:auto;"/>
		<div class="btn-home">
			<span class="btn-home" data-transition="slideup"><img src="images/btn-home2.png" class="img-btn"></span>
		</div>
	    
	</div><!-- /content -->
<script>
	$(function() {      
      $("#introduction").swipe( {
        //Generic swipe handler for all directions
        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
          if(direction == "up"){
          		window.location.href = "rooms.php#first";
				event.stopImmediatePropagation();   
          }
        }
      });
    });
</script>
</div><!-- /page -->

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "home-rooms.php"]);
</script>
</body>
</html>