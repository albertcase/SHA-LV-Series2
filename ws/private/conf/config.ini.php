<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define("_max_upload_size_","8048000");
ini_set("upload_max_filesize",_max_upload_size_); 

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



/**********************************************/
// Variables BDD							  //
//********************************************//
define("_dbhost_","localhost");
define("_dbname_","lvseries");
define("_dbuser_","root");
define("_dbpassword_", ""); 
define("_dbport_", "");
define("_service_video_", 'http://10.10.16.85/ws/');

define("_res_par_page_backo_", "10");


$expediteur_email="contact@lv.com";
$expediteur_name="LV";
$sujet_email_validate ="Sujet Mail";

date_default_timezone_set("Europe/Paris");

session_start();

function __autoload($class_name) {
    if(file_exists(dirname(__FILE__)."/../lib/lib.".$class_name . '.php')) require_once dirname(__FILE__)."/../lib/lib.".$class_name . '.php';
}

$dbConnect = new bdd_connect();
if($dbConnect->error){echo $dbConnect->error; exit();}

?>
