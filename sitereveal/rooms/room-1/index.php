<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>抽象标题 - Louis Vuitton</title>
<style type="text/css">

body{background: #000;}
#scene { margin: 10% auto; padding: 0; float: left; z-index: 1 ;}
#scene img{width: 100%;}

</style>
<link rel="stylesheet" href="../../css/rooms.css">
<script type="text/javascript" src="parallax.js"></script>
<script src="../../js/lib/jquery/jquery.min.js"></script>
<script src="../../js/lib/jquery/jquery-ui.min.js"></script><script>
    $(function() {      

      $(window).load(function() {
            // Pretty simple huh?
            var scene = document.getElementById('scene');
            var parallax = new Parallax(scene);
        });
    });
</script>
</head>
<body>
  <div id="back"> <a href="../../rooms.php#first"></a></div>
    <ul id="scene" class="scene">
                <!--<li class="layer" data-depth="0.00"><img src="img/logo-lv/Sans-titre1.png"></li>-->
        <li class="layer" data-depth="2.00"><img src="../../images/logo-lv/Sans-titre2.png"></li>
        <li class="layer" data-depth="1.60"><img src="../../images/logo-lv/Sans-titre3.png"></li>
        <li class="layer" data-depth="1.20"><img src="../../images/logo-lv/Sans-titre4.png"></li>
        <li class="layer" data-depth="0.80"><img src="../../images/logo-lv/Sans-titre5.png"></li>
        <li class="layer" data-depth="0.40"><img src="../../images/logo-lv/Sans-titre6.png"></li>
        <li class="layer" id="ot" data-depth="0.00"><img src="../../images/logo-lv/Sans-titre7.png"></li>
    </ul>


</body>
</html>
