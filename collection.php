<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>路易威登“系列二”线上展览，点击进入，体验创新数字之旅</title>
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<script src="js/lib/swipe/jquery.touchSwipe.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body class="collection-body">
<img src="/images/share.jpg" class="shareimg" />



	
	<div data-role="page" id="intro">	
		<?php include'menu.php';?>

		<div id="introduction-collection">
			<h1>全部造型</h1>
		</div>
		<div class="btn-home">
			<span data-transition="slideup">
				<img src="images/btn-home2.png" class="img-btn">
			</span>
		</div>

		<script>
			$(function() {      
		      $("#intro").swipe( {
		        //Generic swipe handler for all directions
		        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
		          if(direction == "up"){
		          		$.mobile.changePage("collection.php#grid-collection" , {transition: "slideup", pageContainer:"#intro"}); 
						event.stopImmediatePropagation();   
		          }
		        }
		      });
		    });
		</script>
	</div><!-- /page -->



	<div data-role="page" id="grid-collection">
		<?php include'menu.php';?>
		

		<section class="grid">
			<a href="look.php?id=1" class="item" data-transition="pop"><img src="images/collection/thumbs/01.jpg"></a>
			<a href="look.php?id=2" class="item" data-transition="pop"><img src="images/collection/thumbs/02.jpg"></a>
			<a href="look.php?id=3" class="item" data-transition="pop"><img src="images/collection/thumbs/03.jpg"></a>
			<a href="look.php?id=4" class="item" data-transition="pop"><img src="images/collection/thumbs/04.jpg"></a>
			<a href="look.php?id=5" class="item" data-transition="pop"><img src="images/collection/thumbs/05.jpg"></a>
			<a href="look.php?id=6" class="item" data-transition="pop"><img src="images/collection/thumbs/06.jpg"></a>
			<a href="look.php?id=7" class="item" data-transition="pop"><img src="images/collection/thumbs/07.jpg"></a>
			<a href="look.php?id=8" class="item" data-transition="pop"><img src="images/collection/thumbs/08.jpg"></a>
			<a href="look.php?id=9" class="item" data-transition="pop"><img src="images/collection/thumbs/09.jpg"></a>
			<a href="look.php?id=10" class="item" data-transition="pop"><img src="images/collection/thumbs/10.jpg"></a>
			<a href="look.php?id=11" class="item" data-transition="pop"><img src="images/collection/thumbs/11.jpg"></a>
			<a href="look.php?id=12" class="item" data-transition="pop"><img src="images/collection/thumbs/12.jpg"></a>
			<a href="look.php?id=13" class="item" data-transition="pop"><img src="images/collection/thumbs/13.jpg"></a>
			<a href="look.php?id=14" class="item" data-transition="pop"><img src="images/collection/thumbs/14.jpg"></a>
			<a href="look.php?id=15" class="item" data-transition="pop"><img src="images/collection/thumbs/15.jpg"></a>
			<a href="look.php?id=16" class="item" data-transition="pop"><img src="images/collection/thumbs/16.jpg"></a>
			<a href="look.php?id=17" class="item" data-transition="pop"><img src="images/collection/thumbs/17.jpg"></a>
			<a href="look.php?id=18" class="item" data-transition="pop"><img src="images/collection/thumbs/18.jpg"></a>
			<a href="look.php?id=19" class="item" data-transition="pop"><img src="images/collection/thumbs/19.jpg"></a>
			<a href="look.php?id=20"  class="item" data-transition="pop"><img src="images/collection/thumbs/20.jpg"></a>
			<a href="look.php?id=21"  class="item" data-transition="pop"><img src="images/collection/thumbs/21.jpg"></a>
			<a href="look.php?id=22"  class="item" data-transition="pop"><img src="images/collection/thumbs/22.jpg"></a>
			<a href="look.php?id=23"  class="item" data-transition="pop"><img src="images/collection/thumbs/23.jpg"></a>
			<a href="look.php?id=24"  class="item" data-transition="pop"><img src="images/collection/thumbs/24.jpg"></a>
			<a href="look.php?id=25"  class="item" data-transition="pop"><img src="images/collection/thumbs/25.jpg"></a>
			<a href="look.php?id=26"  class="item" data-transition="pop"><img src="images/collection/thumbs/26.jpg"></a>
			<a href="look.php?id=27"  class="item" data-transition="pop"><img src="images/collection/thumbs/27.jpg"></a>
			<a href="look.php?id=28"  class="item" data-transition="pop"><img src="images/collection/thumbs/28.jpg"></a>
			<a href="look.php?id=29"  class="item" data-transition="pop"><img src="images/collection/thumbs/29.jpg"></a>
			<a href="look.php?id=30"  class="item" data-transition="pop"><img src="images/collection/thumbs/30.jpg"></a>
			<a href="look.php?id=31"  class="item" data-transition="pop"><img src="images/collection/thumbs/31.jpg"></a>
			<a href="look.php?id=32"  class="item" data-transition="pop"><img src="images/collection/thumbs/32.jpg"></a>
			<a href="look.php?id=33"  class="item" data-transition="pop"><img src="images/collection/thumbs/33.jpg"></a>
			<a href="look.php?id=34"  class="item" data-transition="pop"><img src="images/collection/thumbs/34.jpg"></a>
			<a href="look.php?id=35"  class="item" data-transition="pop"><img src="images/collection/thumbs/35.jpg"></a>
			<a href="look.php?id=36"  class="item" data-transition="pop"><img src="images/collection/thumbs/36.jpg"></a>
			<a href="look.php?id=37"  class="item" data-transition="pop"><img src="images/collection/thumbs/37.jpg"></a>
			<a href="look.php?id=38"  class="item" data-transition="pop"><img src="images/collection/thumbs/38.jpg"></a>
			<a href="look.php?id=39"  class="item" data-transition="pop"><img src="images/collection/thumbs/39.jpg"></a>
			<a href="look.php?id=40"  class="item" data-transition="pop"><img src="images/collection/thumbs/40.jpg"></a>
			<a href="look.php?id=41"  class="item" data-transition="pop"><img src="images/collection/thumbs/41.jpg"></a>
			<a href="look.php?id=42"  class="item" data-transition="pop"><img src="images/collection/thumbs/42.jpg"></a>
			<a href="look.php?id=43"  class="item" data-transition="pop"><img src="images/collection/thumbs/43.jpg"></a>
			<a href="look.php?id=44"  class="item" data-transition="pop"><img src="images/collection/thumbs/44.jpg"></a>
			<a href="look.php?id=45"  class="item" data-transition="pop"><img src="images/collection/thumbs/45.jpg"></a>
			<a href="look.php?id=46"  class="item" data-transition="pop"><img src="images/collection/thumbs/46.jpg"></a>
			<a href="look.php?id=47"  class="item" data-transition="pop"><img src="images/collection/thumbs/47.jpg"></a>
			<a href="look.php?id=48"  class="item" data-transition="pop"><img src="images/collection/thumbs/48.jpg"></a>
		</section>
	</div>
	
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "collection.php"]);
</script>
</body>
</html>