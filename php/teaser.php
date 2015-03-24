<?php
/*
session_start();
$max_vid=50;

if( intval($_SESSION["teaser"]["visite"]) >= $max_vid){
	$_SESSION["teaser"]="";
}

if($_SESSION["teaser"]["visite"]) {
	$_SESSION["teaser"]["visite"] = intval($_SESSION["teaser"]["visite"]) + 1;
}else{
	$dispo= range(1, $max_vid); // tableau de toutes les valeurs possibles
	shuffle($dispo); // hop, c'est tout mélangé
	$_SESSION["teaser"]["videos"]=$dispo;
	$_SESSION["teaser"]["visite"] =1;
}
$video_id = $_SESSION["teaser"]["videos"][$_SESSION["teaser"]["visite"]-1];
$video_id = sprintf( "%02d", $video_id );
$myvideo = "/media/teaser/VIDEO".$video_id.".mp4";
*/
session_start();
$max_vid=50;

if(isset($_SESSION["teaser"]["visite"])) {
	if( intval($_SESSION["teaser"]["visite"]) >= $max_vid)
		$_SESSION["teaser"] = "";
	else
		$_SESSION["teaser"]["visite"] = intval($_SESSION["teaser"]["visite"]) + 1;
} else {
	$dispo= range(1, $max_vid); // tableau de toutes les valeurs possibles
	shuffle($dispo); // hop, c'est tout mélangé
	$_SESSION["teaser"]["videos"]=$dispo;
	$_SESSION["teaser"]["visite"] =1;
}

$video_id = $_SESSION["teaser"]["videos"][$_SESSION["teaser"]["visite"]-1];
$video_id = sprintf( "%02d", $video_id );
$myvideo = "/media/teaser/VIDEO".$video_id.".mp4";
?>