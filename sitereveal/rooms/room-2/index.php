<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Louis Vuitton</title>
<style type="text/css">
html{
    background: #000
}
body {
    
}

.cache-top{ width: 100%; height: 49%;  position: fixed; top: 0; left: 0; z-index: 10; border-bottom: 1% solid #1e1e1e;}
.cache-bottom{ width: 100%; height: 50%;  position: fixed; top: 0; left: 0; z-index: 8;}
.background-sacs{width: 100%; height: 60%; background-size: 100% auto; position: fixed; top: 23%; left: 0; z-index: 2; background-repeat: no-repeat;}
</style>
<link rel="stylesheet" href="../../css/rooms.css">
<script type="text/javascript" src="shake.js"></script>
<script src="../../js/lib/jquery/jquery.min.js"></script>
<script src="../../js/lib/jquery/jquery-ui.min.js"></script>
</head>
<body>
    <img src="/images/share.jpg" class="shareimg" />
  <div id="back"> <a href="../../rooms.php#second"></a></div>
    <div class="cache-top"><img src="images/trunk1.png"  width="100%"></div>
    <div class="cache-bottom"><img src="images/trunk2.png"  width="100%"></div>
    <div class="background-sacs"></div>

<div id="dialog" >
  <p>摇一摇</p>
</div>
<script type="text/javascript">
$(function() {
    $( "#dialog" ).delay(1800).fadeOut(600);
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
</body>
</html>
