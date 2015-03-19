<?php
require_once dirname(__FILE__)."/../private/conf/config.ini.php";
require_once dirname(__FILE__)."/../private/conf/auth_admin.php";
?><!DOCTYPE html>
<html>
<body style="width:404px;height:720px;background-color:#000;margin:0;padding:0;" margin=0 padding=0>
<video id="myVideo" width="404" height="720" controls style="display:none;">
  <source src="<?php echo addslashes($_GET["mp4"]);?>" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<div id="loading" style="display:table-cell;width:404px;height:720px;text-align:center;vertical-align:middle;">
<img src="img/loading.gif"/>
</div>
<script>
var vid = document.getElementById("myVideo");
var lod = document.getElementById("loading");
vid.onloadeddata = function() {
	lod.style.display = "none";
	vid.style.display = "block";
	
    vid.play();
};
</script> 
</body>
</html>