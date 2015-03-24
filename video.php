<?php include("php/teaser.php");
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>路易威登“系列二”线上展览，点击进入，体验创新数字之旅</title>
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<script src="js/lib/shake/shake.js"></script>
	<script src="js/exif.js"></script>
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/script.js?v=<?php echo uniqid(); ?>"></script>
</head>

<body class="video">
<img src="/images/share.jpg" class="shareimg" />
	<script type="text/javascript">
		window.onload = function() {
		    

		    
			    //create a new instance of shake.js.
			    var myShakeEvent = new Shake({
			        threshold: 5
			    });

			    // start listening to device motion
			    myShakeEvent.start();

			    // register a shake event
			    window.addEventListener('shake', shakeEventDidOccur, false);

			    //shake event callback
			    function shakeEventDidOccur () {

			    	if($("#intro-video").hasClass("ui-page-active")){
						var video_chemin ="";
						$.get( "php/videoapi.php", function( data ) {
						  video_chemin=data.msg;
						  $("#random-video-wrapper").html("<video width='100%' height='320' controls='controls' poster='images/video/placeholder-video.jpg' id='randomvideo' style='width:100%;'><source src='"+video_chemin+"' type='video/mp4' /></video>");
						
						  document.getElementById('randomvideo').play();
						  $('#shake-it-text').hide();
						  $('#shake-it-again-text').show();
						  $('#logo-video').hide();	
						  $("#randomvideo").height($(window).height()*0.57);		  
						  
						});

			       }

			    }



			

		};
	</script>	

<div data-role="page" id="intro-video">
	<header class="header-home">
		<?php include'menu.php';?>
		<!-- <h1><img src="images/logo.png" alt="louis-vuitton"></h1> -->
	</header>
	
	<div id="random-video-wrapper">
		<video  controls='controls' poster='images/video/placeholder-video.jpg' width='100%' height='320' style='width:100%;' id="teaser-video">
			<source src='<?php echo $myvideo; ?>' type='video/mp4' />
		</video>
	</div>
	<p class="text" id="shake-it-text"><img src="images/shakeshake-wechatwechat.png" /></p>
	<p class="text" id="shake-it-again-text"><img src="images/shakeshake-wechatwechat2.png" /></p>
	<div class="liens-home" >
		<a href="#visualisation">制作微视频</a>
	</div>

	<!-- <footer>
		<h2><img src="images/serie2.png" alt="serie2"></h2>
		<span class="red">#路易威登系列二#</span>
	</footer> -->


	
</div>


<div data-role="page" id="visualisation">
	<?php include'menu.php';?>
	<header class="header-home">
		<h1><img src="images/logo.png" alt="louis-vuitton"></h1>
	</header>


	<article>
		<p>第一步：上传照片<br/>第二步：预览视频</p>
	</article>

	<section class="custom-photos">
	<form id="form1" runat="server" method="post" enctype="multipart/form-data" action="/ws/" data-ajax="false"> 
		<input type="hidden" name="act" value="upload_image"/>
		<input type="hidden" name="dd" value="loc"/>
		<div class="photos">
        	<input type='file' name="photo1" id="photo-1" class="file-photo" />
			<input type="hidden" name="orientation_image1" id="photo-1-orientation"/>
			<textarea name="base64_img1" id="photo-1-img"></textarea>
		</div>
		<div class="photos">
        	<input type='file' name="photo2" id="photo-2" class="file-photo" />
			<input type="hidden" name="orientation_image2" id="photo-2-orientation"/>
			<textarea name="base64_img2" id="photo-2-img"></textarea>
		</div>
		<div class="photos">
        	<input type='file' name="photo3" id="photo-3" class="file-photo" />
			<input type="hidden" name="orientation_image3" id="photo-3-orientation"/>
			<textarea name="base64_img3" id="photo-3-img"></textarea>
		</div>
	</form>
	<a href="javascript:$('#form1').submit();" class="btn" id="preview-btn">制作视频</a>

	<div id="loader-video"></div>
	</section>
	<footer>
		<h2><img src="images/serie2.png" alt="serie2"></h2>
		<span class="red">#路易威登系列二#</span>
	</footer>

</div>

<div data-role="page" id="preview">
	<a class="back-btn" href="video.php" data-ajax="false">back</a>
	<video width='250' height='360' id="finsh-video" controls='controls' poster='images/video/placeholder-video.jpg'><source src='<?php echo "".$_GET["mp4"];?>' type='video/mp4' /></video>
	<p>独家视频已经制作完成!</p>
	<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){
	//on ne fait rien
	}else{ ?>
	<a href="php/down.php?fic=<?php echo urlencode(addslashes($_GET["mp4"]));?>" download="my_video.mp4" class="btn" id="download-btn" data-ajax="false">Download</a>
	<?php } ?>
	<a href="redictshare.php?fic=<?php echo urlencode(addslashes($_GET["mp4"]));?>" class="btn" data-ajax="false">立即分享</a>
	<a href="invitation.php" class="btn" data-ajax="false">申领邀请函</a>
</div>


<script>
	$(function(){
		$(document).ready(function(){
			$("#teaser-video,#finsh-video").height($(window).height()*0.57);
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
_hmt.push(['_trackPageview', "video.php"]);
</script>
</body>
</html>