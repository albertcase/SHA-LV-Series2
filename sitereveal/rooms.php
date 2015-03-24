<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Louis Vuitton</title>
	<meta name="author" content="" />
	<meta name="description" content="" />
	<meta name="keywords"  content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="css/jquery-mobile.css" /> 
	<link rel="stylesheet" type="text/css" href="css/style.css" />		
	<script type="text/javascript" src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
	<script type="text/javascript" src="js/jquery.easings.min.js"></script>
	<script type="text/javascript" src="js/lib/multiscroll/jquery.multiscroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<script type="text/javascript">
	 $(document).ready(function() {
            $('#myContainer').multiscroll({
            	anchors: ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'nine'],
            	menu: '#menu',
            	css3: true,
            	loopBottom:true,
		        onLeave: function(index, nextIndex){
		      
		        	if(nextIndex== "5"){
		        		$(".scrollTop img").attr("src", "./images/scrollTop-black.png"); 
		        	}else{
		        		$(".scrollTop img").attr("src", "./images/scrollTop.png");
		        	}
		        	$('.content-slide').each(function( index ) {



		        	console.log($(this).children(".btn-play"));	
		        	$(this).children(".btn-play").fadeOut(500).fadeIn(500).delay(500).fadeOut(500).fadeIn(500).delay(500).fadeOut(500).fadeIn(500).delay(500).fadeOut(500).fadeIn(500);		 


			        	$(this).animate({opacity: "0"}, 5, function(){							
							$(this).delay(250).animate({opacity: "1"}, 1000);
						});
		        	});
		        }
            });
            window.scrollTo(1, 1);
        });
    </script>

</head>
	<body>
<img src="/images/share.jpg" class="shareimg" />
	<div data-role="page" id="rooms-parallax">	

		<?php include'menu.php';?>
		<section id="controls">
			<ul id="menu">
				<li data-menuanchor="first"><a href="#first">First slide</a></li>
				<li data-menuanchor="second"><a href="#second">Second slide</a></li>
				<li data-menuanchor="third"><a href="#third">Third slide</a></li>
				<li data-menuanchor="fourth" class="middle-anchor"><a href="#fourth">Fourth slide</a></li>
				<li data-menuanchor="fifth"><a href="#fifth">Fifth slide</a></li>
				<li data-menuanchor="sixth"><a href="#sixth">Sixth slide</a></li>
				<li data-menuanchor="seventh"><a href="#seventh">Seventh slide</a></li>
				<li data-menuanchor="eighth"><a href="#eighth">Eighth slide</a></li>
				<li data-menuanchor="nineth"><a href="#nineth">Eighth slide</a></li>
			</ul>
		</section>

		<section id="myContainer">
			<div class="ms-left">
				<div class="ms-section" id="left1" data-right="right1">
					<div class="content-slide white">
						<h1>Space 1</h1>
						<h2>抽象标题</h2>
						<div class="btn-play open" data-link="rooms/room-1/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="left2" data-right="right2">
					<div class="content-slide">
						<h1>Space 2</h1>
						<h2>独白廊</h2>
						<div class="btn-play video" data-link="/media/talking.mp4" data-id="video1"></div>
					</div>
				</div>
				<div class="ms-section" id="left3" data-right="right3">
					<div class="content-slide">
						<h1>Space 3</h1>
						<h2>传奇硬箱</h2>
						<div class="btn-play open" data-link="rooms/room-3/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="left4" data-right="right4">
					<div class="content-slide">
						<h1>Space 4</h1>
						<h2>工艺坊</h2>
						<div class="btn-play video" data-link="/media/savoirfaire.mp4" data-id="video2"></div>
					</div>
				</div>
				<div class="ms-section" id="left5" data-right="right5">
					<div class="content-slide dark">
						<h1>Space 5</h1>
						<h2>配饰廊</h2>
						<div class="btn-play open" data-link="rooms/room-5/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="left6" data-right="right6">
					<div class="content-slide">
						<h1>Space 6</h1>
						<h2>魅力无限时装秀</h2>
						<div class="btn-play open" data-link="rooms/room-6/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="left7" data-right="right7">
					<div class="content-slide">
						<h1>Space 7</h1>
						<h2>后台</h2>
						<div class="btn-play open" data-link="rooms/room-7/index.php#backstage-image2"></div>
					</div>
				</div>
				<div class="ms-section" id="left8" data-right="right8">
					<div class="content-slide">
						<h1>Space 8</h1>
						<h2>海报廊</h2>
						<div class="btn-play open" data-link="rooms/room-8/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="left9" data-right="right9">
					<div class="content-slide">
						<h1>Space 9</h1>
						<h2>贴纸墙</h2>
						<div class="btn-play open" data-link="rooms/room-9/index.php"></div>
					</div>
				</div>
			</div>
			
			<div class="ms-right">
				<div class="ms-section" id="right1">					
					<div class="content-slide white">
						<h1>Space 1</h1>
						<h2>抽象标题</h2>
						<div class="btn-play open" data-link="rooms/room-1/index.php"></div>
					</div></div>
				<div class="ms-section" id="right2">
					<div class="content-slide">
						<h1>Space 2</h1>
						<h2>独白廊</h2>
						<div class="btn-play video" data-link="/media/talking.mp4" data-id="video1"></div>
					</div>
				</div>
				<div class="ms-section" id="right3">
					<div class="content-slide">
						<h1>Space 3</h1>
						<h2>传奇硬箱</h2>
						<div class="btn-play open" data-link="rooms/room-3/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="right4">
					<div class="content-slide">
						<h1>Space 4</h1>
						<h2>工艺坊</h2>
						<div class="btn-play video" data-link="/media/savoirfaire.mp4" data-id="video2"></div>
					</div>
				</div>
				<div class="ms-section" id="right5">
					<div class="content-slide dark">
						<h1>Space 5</h1>
						<h2>配饰廊</h2>
						<div class="btn-play open" data-link="rooms/room-5/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="right6">
					<div class="content-slide">
						<h1>Space 6</h1>
						<h2>魅力无限时装秀</h2>
						<div class="btn-play open" data-link="rooms/room-6/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="right7">
					<div class="content-slide">
						<h1>Space 7</h1>
						<h2>后台</h2>
						<div class="btn-play open" data-link="rooms/room-7/index.php#backstage-image2"></div>
					</div>
				</div>
				<div class="ms-section" id="right8">
					<div class="content-slide">
						<h1>Space 8</h1>
						<h2>海报廊</h2>
						<div class="btn-play open" data-link="rooms/room-8/index.php"></div>
					</div>
				</div>
				<div class="ms-section" id="right9">
					<div class="content-slide">
						<h1>Space 9</h1>
						<h2>贴纸墙</h2>
						<div class="btn-play open" data-link="rooms/room-9/index.php"></div>
					</div>
				</div>
			</div>	
		</section>
		<div class="scrollTop"><!-- <img src="./images/scrollTop.png" /> --></div>
	</div>

</body>
</html>
