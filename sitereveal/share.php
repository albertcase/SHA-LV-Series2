<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>L.V</title>
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


	<script type="text/javascript">
		window.onload = function() {
		    

			$(".layer-step5").on( "click", function(e) {
				$(".layer-step5").hide();
			});


			

		};
	</script>	




<div data-role="page" id="preview">
	<div class="layer-step5"></div>
	<a class="back-btn" href="video.php" data-ajax="false">back</a>
	<video width='250' height='360' controls='controls' poster='images/video/placeholder-video.jpg'><source src='<?php echo "".$_GET["fic"];?>' type='video/mp4' /></video>
	<a href="video.php#visualisation" class="btn" data-ajax="false">制作微视频</a>
	<a href="invitation.php" class="btn" data-ajax="false">申领邀请函</a>
</div>




</body>
</html>