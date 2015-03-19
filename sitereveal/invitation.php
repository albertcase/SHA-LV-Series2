<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LOUIS VUITTON</title>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/jquery-mobile.css" /> 
<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/jquery/jquery.mobile-1.4.5.js"></script>
<script src="js/lib/jquery/jquery.validate.min.js"></script>	
<script type="text/javascript" src="js/script.js"></script>




</head>
<body class="home invitation-body">
	<div data-role="page" id="guest">
		<?php include'menu.php';?>
			<header class="header-home" >
				<h1><img src="images/logo.png" alt="louis-vuitton"></h1>
			</header>
			<div class="bloc-invit" >
				<p class="invit">填写个人信息<br/>获取你的专属邀请函
				</p>	
				<form action="confirmation.php" id="form-invitation" data-ajax="false" method="post">
					<input type="hidden" name="act" value="einvitations"/>
					<input type="text" placeholder="姓名：" class="input-invit"  id="name" name="name">
					<input type="text" placeholder="电话：" class="input-invit"  id="phone" name="phone">
					<div class="red" id="message-error">请填写信息</div>
					<input type="submit" value="提 交" id="submit-invit" data-ajax="false">
				</form>
			</div>
			<footer>
				<h2><img src="images/serie2.png" alt="serie2"></h2>
				<span class="red">#路易威登系列二#</span>
			</footer>

	</div>

	

	<script type="text/javascript">
$(document).ready(function() {
    	$("input[type=submit]").click(function(e) {
    		var name = $("#name").val();
			var phone = $("#phone").val();
			if (name == '') {
	    		e.preventDefault();
	    		$("#message-error").show();
			}
    	});
    });
</script>
</body>

</html>