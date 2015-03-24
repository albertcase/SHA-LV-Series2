<!doctype html>
<html lang="fr">
<head>
  	<meta charset="utf-8">
  	<title>Louis Vuitton</title>
  	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../css/rooms.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
  <script src="../../js/lib/jquery/jquery.min.js"></script>
  <script src="../../js/lib/jquery/jquery-ui.min.js"></script>
  <script src="js/jquery.mb.audio.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
<img src="/images/share.jpg" class="shareimg" />
  
	<div id="dialog" >
  <p>左右滑动
  </p>
</div>
<div id="back"> <a href="../../rooms.php#fourth"></a></div>
<div class="backstage-wrapper sound-text">
  <div class="backstage" style="height:700px">
    <img src="images/backstage1.jpg" id="backstage-image" height="700"/>
    <img src="images/backstage2.jpg" id="backstage-image2" height="700"/>
  </div>
</div>

<script type="text/javascript" src="js/scroller.v2.min.js"></script>
<script type="text/javascript">scroller.auto();</script>
<script type="text/javascript">
$(function() {
    // $( "#dialog" ).dialog();
    $( "#dialog" ).delay(1800).fadeOut(600);




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
          if($(".backstage-wrapper").hasClass("sound-text")){
            $.mbAudio.play('backgroundMusic')
           $(".backstage-wrapper").removeClass("sound-text");            
          }

        });

        $(".sound-text").on( "touchstart", function() {
          if($(".backstage-wrapper").hasClass("sound-text")){
            $.mbAudio.play('backgroundMusic')
           $(".backstage-wrapper").removeClass("sound-text");            
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
_hmt.push(['_trackPageview', "rooms/room-4.php"]);
</script>
</body>
</html>