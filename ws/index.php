<?php
require_once dirname(__FILE__)."/private/conf/config.ini.php";

//place a uniq id for the session user
if(!$_SESSION["user_key"]) $_SESSION["user_key"]=md5(uniqid());

//*************************************************
// SERVICE FOR UPLOAD IMAGE AND PUT FILTER ON IT
//*************************************************
if($_POST["act"]=="upload_image" && $_POST["base64_img1"]!="" && $_POST["base64_img2"]!="" && $_POST["base64_img3"]!=""){
	$obj_video = new videos();
	//IMAGE GENERATOR WITH FILTER
	if($obj_video->saveImageAndMakeFilter($_POST["base64_img1"],1,intval($_POST["orientation_image1"]))){
		$res["err"]=0;
		$res["img1"]=$obj_video->img_path;
		$res["img1_filter"]=$obj_video->img_path_filter;
	}else{
		//IMAGE GENERATION ERROR
		$res["err"]=1;
		$res["msg_img1"]=$obj_video->err_msg;
	}
	
	//IMAGE GENERATOR WITH FILTER
	if($obj_video->saveImageAndMakeFilter($_POST["base64_img2"],2,intval($_POST["orientation_image2"]))){
		if($res["err"]!=1)$res["err"]=0;
		$res["img2"]=$obj_video->img_path;
		$res["img2_filter"]=$obj_video->img_path_filter;
	}else{
		//IMAGE GENERATION ERROR
		if($res["err"]!=1)$res["err"]=1;
		$res["msg_img2"]=$obj_video->err_msg;
	}
	//IMAGE GENERATOR WITH FILTER
	if($obj_video->saveImageAndMakeFilter($_POST["base64_img3"],3,intval($_POST["orientation_image3"]))){
		if($res["err"]!=1)$res["err"]=0;
		$res["img3"]=$obj_video->img_path;
		$res["img3_filter"]=$obj_video->img_path_filter;
	}else{
		//IMAGE GENERATION ERROR
		if($res["err"]!=1)$res["err"]=1;
		$res["msg_img3"]=$obj_video->err_msg;
	}
	
	//make video
	if($res["err"]==0){
		unset($res);
		if($obj_video->makeVideo( $_SESSION["user_key"],$_SESSION["image_1_filter"],$_SESSION["image_2_filter"],$_SESSION["image_3_filter"],1,1,1,1) ){
			$res["err"]=0;
			$res["video"]=$obj_video->video_path;
			unset($_SESSION["user_key"]);
			if($_POST["dd"]!="loc"){
			header("Location:http://creative.samesame.typhon.net/clients/LV/SITE/video.php?mp4=".urlencode($res["video"])."#preview");
			}else{
			header("Location:/video.php?mp4=".urlencode($res["video"])."#preview");
			echo "<script>window.location.assign('/video.php?mp4=".urlencode($res["video"])."#preview')</script>";
			}
			exit();
		}else{
			//VIDEO GENERATION ERROR
			$res["err"]=1;
			$res["msg"]=$obj_video->err_msg;
		}	
	}
	
	
}else if($_POST["act"]=="upload_image"){
	$res["err"]=1;
	$res["msg"]="bad 3 images are required OR bad image";
}

//*************************************************
// SERVICE FOR MAKE VIDEO
//*************************************************
if($_POST["act"]=="make_video"){
	// VIDEO GENERATOR WITH GOOD PARAMETERS
	if($_SESSION["user_key"]!="" && $_SESSION["image_1_filter"]!="" && $_SESSION["image_2_filter"]!="" && $_SESSION["image_2_filter"]!="" && intval($_POST["id_video_1"])>0 && intval($_POST["id_video_2"])>0 && intval($_POST["id_video_3"])>0 && intval($_POST["id_video_4"])>0 ){
		$obj_video = new videos();
		if($obj_video->makeVideo( $_SESSION["user_key"],$_SESSION["image_1_filter"],$_SESSION["image_2_filter"],$_SESSION["image_3_filter"],intval($_POST["id_video_1"]),intval($_POST["id_video_1"]),intval($_POST["id_video_1"]),intval($_POST["id_video_1"])) ){
			$res["err"]=0;
			$res["video"]=$obj_video->video_path;
		}else{
			//VIDEO GENERATION ERROR
			$res["err"]=1;
			$res["msg"]=$obj_video->err_msg;
		}
	}else{
		$res["err"]=1;
		$res["msg"]="bad parameters video";
	}
}

//*************************************************
// SERVICE RANDOM VIDEO
//*************************************************
if($_GET["act"]=="random_video"){
	$obj_video = new videos();
	$res["err"]=0;
	$res["msg"]=$obj_video->random_video();
}


//*************************************************
// SERVICE COLLECTION LOOK
//*************************************************
if($_POST["act"]=="look"){
	if(intval($_POST["id"])>0){
		$obj_look= new look(intval($_POST["id"]));
		$res["err"]=0;
		$res["id_imgs"] = "".$obj_look->content->id_imgs;
		$res["titre"] = "".$obj_look->content->titre;
		$res["description"] = "".$obj_look->content->description;
	}else{
		$res["err"]=1;
		$res["msg"]="bad parameters look";
	}
}

//*************************************************
// SERVICE E-INVITATION
//*************************************************
if($_POST["act"]=="einvitations"){
	if($_POST["name"]){
		$obj_look = new einvitations($_POST["name"],$_POST["tel"]);
		$invitation = $obj_look->makeinvit("".$_POST["name"],$obj_look->last_id);
		$res["err"] = 0;
		$res["msg"] = "OK";
		$res["img"]="".$invitation;
	}else{
		$res["err"] = 1;
		$res["msg"] = "bad parameters invitations";
	}
}

if($_GET["act"]=="test"){
	$obj_look = new einvitations();
	$obj_look->makeinvit("Le nom ici => 全部造型");
	exit();
}


//*************************************************
// NO SERVICE CALL
//*************************************************
if(!$res){
	$res["err"]=1;
	$res["msg"]="bad service";
}
header('Content-type: application/json');
echo json_encode($res);
?>