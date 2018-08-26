<?php
require_once dirname(__FILE__)."/private/conf/config.ini.php";
/*echo exec(_ffmpeg_path_." 2>&1",$output);
var_dump($output);*/

if($_POST["act"]=="makevideo"){
	//parameters verifications
	if($_POST["user_key"] && $_POST["image_1_filter"] && $_POST["image_2_filter"] && $_POST["image_3_filter"]){
		//A CODER : GET 3 IMAGES AND 4 ID FOR GENERATE VIDEO TMP
		$obj_ffmpeg = new ffmpeg();
		$mp4_path = $obj_ffmpeg->makeVideo($_POST["user_key"],$_POST["image_1_filter"],$_POST["image_2_filter"],$_POST["image_3_filter"]);
		//RETURN EXEMPLE
		$res["err"]=0;
		$res["video_name"]=$mp4_path;
		$res["msg"]="OK";
	}else{
		//BAD PARAMETERS
		$res["err"]=1;
		$res["msg"]="parameters must be id, img_1, img_2, img3";
	}
}


if($_POST["act"]=="delete_video_generate"){
//parameters verifications
	if($_POST["video_name"]!=""){
		// A CODER : DELETE VIDEO WHEN VIDEO HAS BEEN DOWNLOADED
		$obj_ffmpeg = new ffmpeg();
		$obj_ffmpeg->suppVideo(addslashes($_POST["video_name"]));
		// RETURN ALWAYS OK ...
		$res["err"]=0;
		$res["msg"]="delete OK";
	}else{
		//BAD PARAMETERS
		$res["err"]=1;
		$res["msg"]="parameters must be video_name";
	}
}

if(!$res){
	//BAD SERVICE
	$res["err"]=1;
	$res["msg"]="bad services";
}

echo json_encode($res);
?>