<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>Louis Vuitton</title>

	<!-- Behavioral Meta Data -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Styles -->
	
	<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
	<link rel="stylesheet" href="../../css/rooms.css">
	<link href="styles/jquery.bxslider.css" rel="stylesheet" />

</head>
<body>
	<img src="/images/share.jpg" class="shareimg" />
	<div id="container" class="container">
		<div id="back"> <a href="../../rooms.php#nine"></a></div>
		<div>
		<ul id="scene" class="scene">
			<li class="layer" data-depth="8.00"><img src="images/sticker01.png" ></li>
			<li class="layer" data-depth="5.80"><img src="images/sticker02.png"></li>
			<li class="layer" data-depth="6.60"><img src="images/sticker03.png"></li>
			<li class="layer" data-depth="5.40"><img src="images/sticker04.png"  ></li>
			<li class="layer" data-depth="4.20"><img src="images/sticker05.png"  ></li>
			<li class="layer" data-depth="7.00"><img src="images/sticker06.png"></li>
			<li class="layer" data-depth="8.00"><img src="images/sticker07.png" ></li>
			<li class="layer" data-depth="5.80"><img src="images/sticker08.png"></li>
			<li class="layer" data-depth="6.60"><img src="images/sticker09.png"></li>
			<li class="layer" data-depth="5.40"><img src="images/sticker10.png"  ></li>
			<li class="layer" data-depth="4.20"><img src="images/sticker11.png"  ></li>
			<li class="layer" data-depth="7.00"><img src="images/sticker12.png"></li> 
			<li class="layer" data-depth="8.00"><img src="images/sticker13.png" ></li>
		</ul>
		
		</div>
		
		<div class="slide">
		<ul id="slider-stickers" class="bxslider">
			<li><img src="images/01.gif"></li>
			<li><img src="images/02.gif"></li>
			<li><img src="images/03.gif"></li>
			<li><img src="images/04.gif"></li>
			<li><img src="images/05.gif"></li>
			<li><img src="images/06.gif"></li>
			<li><img src="images/07.gif"></li>
			<li><img src="images/08.gif"></li>
			<li><img src="images/09.gif"></li>
			<li><img src="images/10.gif"></li>
			<li><img src="images/11.gif"></li>
			<li><img src="images/12.gif"></li>
			<li><img src="images/13.gif"></li>
		</ul>
		
		</div>
		<div id="dialog" style="background:url(images/notification.jpg) no-repeat center center #020202; background-size:cover;" ></div>
	</div>

	<!-- Scripts -->
	<script src="../../js/lib/jquery/jquery.min.js"></script>
  <script src="../../js/lib/jquery/jquery-ui.min.js"></script>
	<script src="scripts/jquery.parallax.js"></script>
	<script src="scripts/jquery.bxslider.js"></script>
	<script src="scripts/shake.js"></script>
	<script>
      
	// Yep, that's it!
	$('#scene').parallax( {
		  calibrateX: false,
		  calibrateY: true,
		  invertX: false,
		  invertY: false,
		  limitX: false,
		  limitY: 30,
		  scalarX: 2,
		  scalarY: 8,
		  frictionX: 0.2,
		  frictionY: 0.8,
		  originX: 0.0,
		  originY: 0.5
});
	$(document).ready(function(){
  		slider =  $('.bxslider').bxSlider({
  			pager: false,
  			randomStart: true,
  		});
  
	});
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
             
            if($(".slide").hasClass("active")){
            	slider.reloadSlider();
            } else{
            	$('.slide').addClass("active");
            	$('.wechat').css("opacity","1");
            	$('#back').css("opacity","1");
            }

	       
	    }
	};
	

	</script>
	<script type="text/javascript">
$(function() {
    // $( "#dialog" ).dialog();
    $( "#dialog" ).delay(3000).fadeOut(600);
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
_hmt.push(['_trackPageview', "rooms/room-9/index.php"]);
</script>
</body>
</html>
