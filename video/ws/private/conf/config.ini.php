<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//anti XSS
foreach($_POST as $k => $v) {  
	if(!is_array($v)) {
		$_myarray[$k]=htmlspecialchars (strip_tags($v)); 
	}else{  
		foreach($v as $k2 => $v2){$_myarray[$k][$k2]=htmlspecialchars (strip_tags($v2));}  
	} 
}
$_POST=$_myarray;

foreach($_GET as $k => $v) {  
	if(!is_array($v)) {
		$_myarray[$k]=htmlspecialchars (strip_tags($v)); 
	}else{  
		foreach($v as $k2 => $v2){$_myarray[$k][$k2]=htmlspecialchars (strip_tags($v2));}  
	} 
}
$_GET=$_myarray;

foreach($_REQUEST as $k => $v) {  
	if(!is_array($v)) {
		$_myarray[$k]=htmlspecialchars (strip_tags($v)); 
	}else{  
		foreach($v as $k2 => $v2){$_myarray[$k][$k2]=htmlspecialchars (strip_tags($v2));}  
	} 
}
$_REQUEST=$_myarray;


define("_ffmpeg_path_","/usr/local/bin/ffmpeg");
define("_front_http_","http://127.0.0.1");


date_default_timezone_set("Europe/Paris");

session_start();

function __autoload($class_name) {
    if(file_exists(dirname(__FILE__)."/../lib/lib.".$class_name . '.php')) require_once dirname(__FILE__)."/../lib/lib.".$class_name . '.php';
}

?>
