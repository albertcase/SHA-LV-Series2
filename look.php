<?php 
include("php/ws.php"); $_POST["act"]="look"; $_POST["id"]=intval($_GET["id"]); $look = wsCall($_POST);
$p = intval($_GET["id"]);
$p_max=48;
?><!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>路易威登“系列二”线上展览&nbsp;点击进入&nbsp;体验创新数字之旅</title>
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<style type="text/css">
		html,body{
			width: 100%;
			height: 100%;
			position: relative;
			overflow: hidden;
		}
	</style>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body class="look">
<img src="/images/share.jpg" class="shareimg" />

<div data-role="page" id="look-detail" data-next="look.php?id=<?php if($p<$p_max){echo $p+1;}else{echo $p;} ?>" data-prev="look.php?id=<?php if($p>1){echo $p-1;}else{echo $p;}?>">		
	<a href="collection.php#grid-collection" data-ajax="false">
		<img src="images/close-white.png" class="img-btn close">
	</a>
	<section id="photo-look">
		<?php if($p>1){?><a href="look.php?id=<?php echo $p-1;?>" class="left arrow">&nbsp;</a><?php } ?>
		<?php if($p<$p_max){?><a href="look.php?id=<?php echo $p+1;?>" class="right arrow">&nbsp;</a><?php } ?>
		<img src="images/collection/models/<?php echo "".$look->id_imgs;?>.jpg" />
		<div id="cta-look">
			<a href="#detail-look" data-ajax="false"></a>
			<p><?php echo "".$look->titre;?></p>
		</div>
	</section>	



	<section id="detail-look">
		<?php if ($look->id_imgs != '18' && $look->id_imgs != '35' && $look->id_imgs != '36' && $look->id_imgs != '37' && $look->id_imgs != '43'){?>
		<img src="images/collection/details/<?php echo "".$look->id_imgs;?>.jpg" />
		<?php } ?>
		<p><?php echo "".$look->description;?></p>

		<p class="click-to-call"><a href="/saosao.html">预约到店</a><br/><br/>路易威登客服中心：<a href="tel:4006588555">4006588555</a></p>

	</section>
	<script>
	$(function(){
		$( document ).on( "pageinit", "#look-detail", function() {
				var 
					$page = $(this),
					page = "#" + $page.attr( "id" ), 
					next = $page.jqmData( "next" ), 
					prev = $page.jqmData( "prev" ); 
					if ( next ) {  
						$page.on( "swipeleft", function(event) {
							$.mobile.changePage( next , {transition: "fade", pageContainer:"#look-detail"}); 
							event.stopImmediatePropagation();   
						}); 
					} 
				 
					if ( prev ) { 
						$page.on( "swiperight", function(event) { 
							$.mobile.changePage( prev, { transition: "fade" , reverse: true, pageContainer:"#look-detail" } ); 
							event.stopImmediatePropagation();   
						}); 
					} 
			
		});
		$("#cta-look").click(function(e) {
			$("#cta-look").hide();
		});
	});
</script>
</div>


<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "look.php"]);
</script>
</body>
</html>