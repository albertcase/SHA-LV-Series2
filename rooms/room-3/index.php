<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>路易威登“系列二”线上展览&nbsp;点击进入&nbsp;体验创新数字之旅</title>
<style type="text/css">
html{
    background: #000
}
body {
    
}

.cache-top{ width: 100%; height: 49%;  position: fixed; top: 0; left: 0; z-index: 10; border-bottom: 1% solid #1e1e1e;}
.cache-bottom{ width: 100%; height: 50%;  position: fixed; top: 0; left: 0; z-index: 8;}
.background-sacs{width: 100%; height: 60%; background-size: 100% auto; position: fixed; top: 23%; left: 0; z-index: 2; background-repeat: no-repeat;}

.sound{position: fixed; bottom: 15px; right: 15px; display: block; width: 40px; height: 40px; background: url(./images/music.png) no-repeat center center; background-size: 98% auto; z-index: 999999;}
.sound.off{opacity: 0.5;}
</style>
<link rel="stylesheet" href="../../css/rooms.css">
<script type="text/javascript" src="shake.js"></script>
<script src="../../js/lib/jquery/jquery.min.js"></script>
<script src="../../js/lib/jquery/jquery-ui.min.js"></script>
  <script src="js/jquery.mb.audio.js"></script>
</head>
<body>
<img src="/images/share.jpg" class="shareimg" />
  <div id="back" > <a href="../../rooms.php#third"></a></div>
    <div class="cache-top"><img src="images/trunk1.png"  width="100%"></div>
    <div class="cache-bottom"><img src="images/trunk2.png"  width="100%"></div>
    <div class="background-sacs"></div>
    <div class="sound on"></div>

<div id="dialog" style="background:url(images/notification.jpg) no-repeat center center #020202; background-size:cover;" >

</div>
<script type="text/javascript">
$(function() {
    $( "#dialog" ).delay(2200).fadeOut(600);




            $.mbAudio.sounds = {
                  backgroundMusic: {
              id    : "backgroundMusic",
              mp3   : "sounds/sound.mp3",
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

        $(".sound").on( "click", function() {
          if($(".sound").hasClass("on")){
            $.mbAudio.play('backgroundMusic');
           $(".sound").removeClass("on"); 
           $(".sound").addClass("off");            
          }else{
                 $.mbAudio.stop('backgroundMusic');
             $(".sound").removeClass("off"); 
             $(".sound").addClass("on");  
          }

        });





  });
</script>
<script type="text/javascript">
window.onload = function() {

    var numbershake = Math.floor(Math.random() * 7);
    

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

        
        $( ".cache-top" ).animate({top:"0%"},  1000, 'easeInOutCubic', function() {    
            $(".background-sacs").css( "background-image", "url(./images/0"+numbershake+".gif)" );     
            OpenBox(); 
        });  

        if(numbershake<6){
          numbershake++;
        }else{
          numbershake=0;
        }


    }

    function OpenBox(){
            $( ".cache-top" ).animate({top:"-45%"}, 500, function() {         });
         // $( ".cache-bottom" ).animate({bottom:"-40%"}, 500, function() {         });
    }
};
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?df4334f8d06255e9fd82b07d21c47e3c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
_hmt.push(['_trackPageview', "rooms/room-3/index.php"]);
</script>
</body>
</html>
