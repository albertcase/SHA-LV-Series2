<?php include("php/teaser.php"); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LOUIS VUITTON - SERIES 2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/lib/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />		
</head>
<body>

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

</body>

</html>