<!doctype html>
<html lang="fr">
<head>
  	<meta charset="utf-8">
  	<title>路易威登“系列二”线上展览&nbsp;点击进入&nbsp;体验创新数字之旅</title>
  	<link rel="stylesheet" href="../../css/rooms.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
  <script src="../../js/lib/jquery/jquery.min.js"></script>
  <script src="../../js/lib/jquery/jquery-ui.min.js"></script>
  <script src="../../js/lib/jquery/jquery.mobile-1.4.5.js"></script>
  <script src="js/jquery.touchSwipe.min.js"></script>
  <script src="js/jquery.mb.audio.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <img src="/images/share.jpg" class="shareimg" />
<div id="dialog" style="background:url(images/notification.jpg) no-repeat center center #020202; background-size:cover;" >

</div>
<div id="back"> <a href="../../rooms.php#sixth" data-ajax="false"></a></div>
<div id="background" class="sound-text"></div>
<script type="text/javascript">
$(function() {
    // $( "#dialog" ).dialog();
    $( "#dialog" ).delay(2200).fadeOut(600);




            $.mbAudio.sounds = {
                  backgroundMusic: {
              id    : "backgroundMusic",
              mp3   : "./sounds/sound.mp3",
              loop : true
            }
        };

        function audioIsReady() {
 
        }

        $(document).on("initAudio", function () {

        });

        $(document).ready(function(){
          $.mbAudio.play('effectSprite', 'streak');


        })

        $(".sound-text").on( "click", function() {
          if($("#background").hasClass("sound-text")){
            $.mbAudio.play('backgroundMusic')
           $("#background").removeClass("sound-text");            
          }

        });

        $(".sound-text").on( "touchstart", function() {
          if($("#background").hasClass("sound-text")){
            $.mbAudio.play('backgroundMusic')
           $("#background").removeClass("sound-text");            
          }

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
_hmt.push(['_trackPageview', "rooms/room-6/index.php"]);
</script>
</body>
</html>