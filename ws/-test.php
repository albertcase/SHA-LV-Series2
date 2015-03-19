<?php
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

//anti XSS
foreach($_POST as $k => $v) {  
	if(!is_array($v)) {
		$_myarray[$k]=strip_tags($v); 
	}else{  
		foreach($v as $k2 => $v2){$_myarray[$k][$k2]=strip_tags($v2);}  
	} 
}
$_POST=$_myarray;
foreach($_GET as $k => $v) {  
	if(!is_array($v)) {
		$_myarray[$k]=strip_tags($v); 
	}else{  
		foreach($v as $k2 => $v2){$_myarray[$k][$k2]=strip_tags($v2);}  
	} 
}
$_GET=$_myarray;


?>
<html>
<head>
<?php
if($_GET["clear"]){
session_start();
session_unset($_SESSION);
echo "<script>location='test.php';</script>";
exit();
}
?><meta charset="UTF-8">
</head>
<body>
<b>Upload Image :</b><br>
<br>
<form method="POST" action="index.php" enctype="multipart/form-data">
	<input type="hidden" name="act" value="upload_image">
	Image : <input type="file" name="fichier" value=""><br>
	Numero Image (1,2 ou 3) : <input type="text" name="numimage" value="1"><br>
	<input type="submit" value="send"/>
</form>
<?php if($_SESSION["image_1_filter"] && $_SESSION["image_2_filter"] && $_SESSION["image_3_filter"]) { ?>
<br><br>
<b>Make video :</b><br>
<br>
<form method="POST" action="index.php" enctype="multipart/form-data">
	<input type="hidden" name="act" value="make_video">
	liste des images :<br>
	<?php
	for($i=1;$i<4;$i++){
	?>
	<a href="<?php echo $_SESSION["image_".$i."_filter"];?>" target="_blank"><img src="<?php echo $_SESSION["image_".$i."_filter"];?>" style="width:100px;margin:5px;float:left;"/></a>
	<?php
	}
	?>
	<br clear="all"><br>
	ID video1 : <input type="text" name="id_video_1" value="1"><br>
	ID video2 : <input type="text" name="id_video_2" value="1"><br>
	ID video3 : <input type="text" name="id_video_3" value="1"><br>
	ID video4 : <input type="text" name="id_video_4" value="1"><br>
	<input type="submit" value="Make video"/>
</form>
<?php } ?>
<?php if($_SESSION["video_mp4"]){?>
<br><br><b>VIDEO GÉNÉRÉ :</b><br>
<a href="<?php echo $_SESSION["video_mp4"];?>" target="_blank"><?php echo $_SESSION["video_mp4"];?></a>
<?php } ?>
<pre>
<?php print_r($_SESSION); ?>
</pre>
</body>
</html>

