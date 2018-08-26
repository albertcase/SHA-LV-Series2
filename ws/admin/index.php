<?php
require_once dirname(__FILE__)."/../private/conf/config.ini.php";
require_once dirname(__FILE__)."/../private/conf/auth_admin.php";
if($_GET["p"]) $_SESSION["admin"]["p"]=addslashes($_GET["p"]);
if(!$_GET["page"]) $_GET["page"]=1;
if(!$_SESSION["admin"]["p"]) $_SESSION["admin"]["p"]="new";

$obj_video = new videos();

//post des miniforms
if($_POST["act"]=="miniform" && intval($_POST["id"])>0){
	$obj_video->changeEtat(intval($_POST["id"]),intval($_POST["validate"]));
}


if($_SESSION["admin"]["p"]=="new"){
	$d = $obj_video->getListVideosBacko('0',intval($_GET["page"]));
}

if($_SESSION["admin"]["p"]=="app"){
	$d = $obj_video->getListVideosBacko('1',intval($_GET["page"]));
}

if($_SESSION["admin"]["p"]=="ref"){
	$d = $obj_video->getListVideosBacko('2',intval($_GET["page"]));
}


?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js no-support oldie  " lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie ie7 oldie " lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie ie8 " lang="en"> <![endif]-->
<!--[if IE 9]> <html class="no-js ie ie9 " lang="en"> <![endif]-->
<!--[if ! IE]> <!-->
<html class="" lang="en"> <!--<![endif]-->
    <head>
        <title>SERIE2</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=1024" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
		<script src="/js/lib/jquery/jquery.min.js"></script>
		<script src="js/jquery.colorbox-min.js"></script>
		<script src="js/simple.carousel.js"></script>
		<script src="js/function.js"></script>
     </head>
    
<body>
<div id="logo"><img src="img/logo.gif"/></div>
<div id="nav">
	<div class="center">
	<span <?php if($_SESSION["admin"]["p"]=="new"){ ?>class="active"<?php } ?> onclick="location='?p=new'">NEW&nbsp;VIDEOS</span>
	<span <?php if($_SESSION["admin"]["p"]=="app"){ ?>class="active"<?php } ?> onclick="location='?p=app'" style="width:250px;">APPROVED&nbsp;VIDEOS</span>
	<span <?php if($_SESSION["admin"]["p"]=="ref"){ ?>class="active"<?php } ?> onclick="location='?p=ref'" style="width:250px;">REFUSED&nbsp;VIDEOS</span>
	</div>
</div>
<div id="container-central">
	<?php
	if($_SESSION["admin"]["p"]=="search"){
	?>
	<form method="POST" id="form_search">
	<input type="hidden" name="act" value="form_search">
	<center>
	<table style="border: #CCCCCC 1px solid; background-color:#f2f2f2;width:900px;text-align:center;" cellpadding=5px;>
		<tr><td colspan=3 style="border-bottom:#CCCCCC 1px solid;"><b>SEARCH FORM</b></td></tr>
		<tr>
			<td >Pseudo :<br><input id="search_pseudo" type="text" name="pseudo" value="<?php echo $_SESSION["admin"]["search"]["pseudo"] ;?>" style="width:150px;height:20px;"/></td>
			<td>Tag photo :<br>
			<select name="search_tag" style="border:0;width:150px;">
			<option value="">ALL</option>
			<?php 
			foreach($categories as $k2=>$v2){ 
			?>
			<option value="<?php echo $v2["oid_cat"];?>" <?php if($v2["oid_cat"]==$_SESSION["admin"]["search"]["search_tag"]){ echo "selected";} ?>><?php echo $v2["categories"];?></option>
			<?php
			}
			?>
			</select><br></td>
			<td>Photos status :<br>
			<select name="search_etat" style="border:0;width:150px;">
			<option value="">ALL</option>
			<option value="0" <?php if("0"==$_SESSION["admin"]["search"]["search_etat"]){ echo "selected";} ?>>NEW</option>
			<option value="99" <?php if("99"==$_SESSION["admin"]["search"]["search_etat"]){ echo "selected";} ?>>PRE-APPROVED</option>
			<option value="1" <?php if("1"==$_SESSION["admin"]["search"]["search_etat"]){ echo "selected";} ?>>APPROVED</option>
			<option value="2" <?php if("2"==$_SESSION["admin"]["search"]["search_etat"]){ echo "selected";} ?>>REFUSED</option>
			</select></td>
		</tr>
		<tr><td colspan=3 style="font-size:3px;">&nbsp;</td></tr>
		<tr><td colspan=3 style="padding-top:5px;border-top:#CCCCCC 1px solid;"><a href="javascript:;" onclick="$('#form_search').submit();"><img src="img/btok.png"/></a></td></tr>
	</table>
	</form>
	</center>
	<?php
		if(count($d)<1){
			echo "<center><br>No result found</center>";
		}
	}
	
	?>
	<?php 
	if($_SESSION["admin"]["p"]=="new" || $_SESSION["admin"]["p"]=="app" || $_SESSION["admin"]["p"]=="ref" || $_SESSION["admin"]["p"]=="search"){
	if(count($d)<1)	echo "<center><br>No result found</center>";
	if(count($d)>0)
	foreach($d as $k=>$v){
	?>
	<!-- debut fiche -->
	<div class="fiche">
		<div>
		<div class="visu"><a href="video_player.php?mp4=<?php echo urlencode($v["mp4"]);?>&v=1" class="colorbox"><img src="<?php echo str_replace(".png","_filter.png",$v["img1"]);?>"/></a><div style="position:absolute;top:0;left:0;width:166px;height:300px;" ><div style="width:166px;height:300px;display:table-cell;text-align:center;vertical-align:middle;cursor:pointer;" href="video_player.php?mp4=<?php echo urlencode($v["mp4"]);?>&v=1" class="colorbox"><img src="img/play.png"style="width:50px;height:50px;"/></div></div></div>
		<form method="post" id="miniform_<?php echo $v["id"];?>">
		<input type="hidden" name="id" value="<?php echo $v["id"];?>"/>
		<input type="hidden" name="act" value="miniform"/>
		<div class="littleform">
		<span class="username"><?php echo $v["pseudo"];?> <?php if($v["url_profil"]){ ?><a href="<?php echo $v["url_profil"];?>" target="_blank"><span class="view" style="color:#000;">(profil)</span></a><?php } ?> <?php if($v["url_direct_post"]){ ?><a href="<?php echo $v["url_direct_post"];?>" target="_blank"><span class="view" style="color:#000;">(post)</span></a><?php } ?></span><br>
		<span class="date"><?php echo $v["date_ins"];?></span><br>
		<div class="hashtag"><?php echo $v["hashtags"];?></div>
		<div class="images3">
		<a href="<?php echo str_replace(".png","_filter.png",$v["img1"]);?>" class="colorbox" rel="<?php echo $k;?>"><img src="<?php echo str_replace(".png","_filter.png",$v["img1"]);?>"/></a>
		<a href="<?php echo str_replace(".png","_filter.png",$v["img2"]);?>" class="colorbox" rel="<?php echo $k;?>"><img src="<?php echo str_replace(".png","_filter.png",$v["img2"]);?>"/></a>
		<a href="<?php echo str_replace(".png","_filter.png",$v["img3"]);?>" class="colorbox" rel="<?php echo $k;?>"><img src="<?php echo str_replace(".png","_filter.png",$v["img3"]);?>"/></a>
		</div>
		
			<div class="bts">
				<?php if($v["etat"]==0 || $v["etat"]==2 ){ ?><div class="btvalidate"><input type="radio" id="validate<?php echo $v["id"];?>" name="validate" value="1" <?php if($v["etat"]==1){echo "checked";} ?> ><label id="validate<?php echo $v["id"];?>_err" for="validate<?php echo $v["id"];?>" onclick="$('#mcheck<?php echo $v["id"];?>').show();">VALIDATE</label></div><?php } ?>
				<?php if($v["etat"]==0 || $v["etat"]==1 ){ ?><div class="btrefuse"><input type="radio" id="refuse<?php echo $v["id"];?>" name="validate" value="2" <?php if($v["etat"]==2){echo "checked";} ?>><label id="refuse<?php echo $v["id"];?>_err" for="refuse<?php echo $v["id"];?>" onclick="$('#mcheck<?php echo $v["id"];?>').hide();">REFUSE</label></div><?php } ?>
				<br clear=all>
			</div>
			<div class="checks" id="mcheck<?php echo $v["oid"];?>">
				<br clear=all>
			</div>
		</div>
		</form>
		<br clear=all>
		</div>
		<div class="btok"><a href="javascript:;" onclick="validateMiniForm('<?php echo $v["id"];?>')"><img src="img/btok.png"/></a></div>
	</div>
	<!-- fin fiche -->
	<?php 
	}
	if(count($d)>0){
	?>
	<br clear=all>
	<div id="pagination">
	Pages : 
	<?php
	
	$current_page = $obj_video->current_page;
	$res_by_page = $obj_video->result_by_page;
	$tot = $obj_video->nb_results_tot;
	
	$nb_page=ceil($tot/$res_by_page);
	
	for($i=1;$i<=$nb_page;$i++){
		if($current_page==$i) 
			echo "<b>".$i."</b> ";
		else
			echo "<a href='?p=".$_SESSION["admin"]["p"]."&page=".$i."'>".$i."</a> ";
	}
	?>
	</div>
	<?php
	}
	} 
	?>
	
	
	
</div>
<script>
if($("#inputupload").length>0){
	 iframe = document.createElement("IFRAME");  
     iframe.name = "iframe_tools";
     iframe.id = "iframe_tools"; //some browsers target by id not name
     document.body.appendChild(iframe);
     document.getElementById("inputupload").target = "iframe_tools";
}
</script>
</body>
</html>