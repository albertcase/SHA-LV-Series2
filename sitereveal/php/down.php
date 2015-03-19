<?php

$fileId = addslashes($_GET['fic']);

$filePath = "/data/website/lvseries".$fileId;
if(addslashes($_GET["type"])=="jpg"){
$fileName = "LV_einvitations_".date("YmdHis").".jpg"; //or a name from database like getFilenameForID($id)
}else{
$fileName = "LV_VIDEO_".date("YmdHis").".mp4"; //or a name from database like getFilenameForID($id)
}
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$fileName.'"');
header('Content-Type: application/force-download');
readfile($filePath);


?>