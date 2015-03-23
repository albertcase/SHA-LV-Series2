<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Louis Vuitton</title>
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


</body>
</html>