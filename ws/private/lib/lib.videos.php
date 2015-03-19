<?php
/**************************************************************/
// AMA : 12/02/2015
/**************************************************************/
class videos  {
	
	public $db_connect="";
	public $db_error="";
	public $current_resultat="";
	public $err_msg="";
	public $img_path="";
	public $img_path_filter="";
	public $video_path="";
	
	public $current_page=1;
	public $result_by_page = _res_par_page_backo_;
	public $nb_results_tot=0;
	
	/********************************************************/
	// Class constructor, instanciate BDD
	/********************************************************/

	public function videos() {
		global $dbConnect;
		$this->dbConnect = $dbConnect;
	}
	
	public function saveImageAndMakeFilter($fichier,$numimage,$orientation=0){
			
			//Stockage by date for not reach the directory file max 
			$dir1 = date("Ymd");
			if(!is_dir(dirname(__FILE__)."/../../upload/users/".$dir1)){
				@mkdir(dirname(__FILE__)."/../../upload/users/".$dir1);
				@chmod(dirname(__FILE__)."/../../upload/users/".$dir1,0777);
			}
			if(!$_SESSION["directory"]) $_SESSION["directory"]="/upload/users/".$dir1;
			//file name are $_SESSION["user_key"]."_".numimage.".png"
			$msg = $this->SaveImageAndConvertToPng($fichier,dirname(__FILE__)."/../..".$_SESSION["directory"]."/".$_SESSION["user_key"]."_".$numimage.".png",$numimage,$orientation);
			
			//error message or place in session the user image
			if($msg=="OK"){
				$this->img_path = "/ws".$_SESSION["directory"]."/".$_SESSION["user_key"]."_".$numimage.".png";
				$this->img_path_filter = "/ws".$_SESSION["directory"]."/".$_SESSION["user_key"]."_".$numimage."_filter.png";
				$_SESSION["image_".$numimage] = $this->img_path;
				$_SESSION["image_".$numimage."_filter"] = $this->img_path_filter;
				return true ;
			}else{
				$this->err_msg = $msg;
				return false ;
			}
	}
	
	private function SaveImageAndConvertToPng($fichier,$filename,$numimage,$orientation=0){
		//save base64
		$img = dirname(__FILE__)."/../../upload/tmp/". uniqid() . '.jpg';
		$formImage = imagecreatefromstring(base64_decode(str_replace("data:image/jpeg;base64,","",$fichier)));
		imagejpeg($formImage,$img,100);
		
		$dst = $filename;

		if (($img_info = getimagesize($img)) === FALSE)
		  return ("Image not found or not an image");
		//print_r($img_info);
		
		//$exif = exif_read_data($img,0,true);
		/*echo "<pre>";
		print_r($exif);
		echo "</pre>";*/
		//$orientation = $exif['IFD0']['Orientation'];
		/*echo $fichier['tmp_name'].">>".$orientation."<br>";
		exit();*/
		
		
		$width = $img_info[0];
		$height = $img_info[1];

		switch ($img_info[2]) {
		  case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
		  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
		  case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
		  default : return "Unknown filetype";
		}
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
		switch($orientation) {
				case 3:
					$tmp  = imagerotate($tmp , 180, 0);
					break;
				case 6:
					$tmp  = imagerotate($tmp , -90, 0);
					break;
				case 8:
					$tmp  = imagerotate($tmp , 90, 0);
					break;
			}
		if(imagepng($tmp, $dst,9)){
		$this->resize_crop_image(404, 720, $dst, $dst, $quality = 80);
		$this->addfilter($dst,$width,$height,$numimage);
		}
		@unlink($img);
		return "OK";
	
	}
	
	private function addfilter($img,$w,$h,$id_filer){
		$image_1 = imagecreatefrompng($img);
		$image_2 = imagecreatefrompng(dirname(__FILE__)."/../../videos/effects/filtre_".$id_filer.".png");
		imagealphablending($image_1, true);
		imagesavealpha($image_1, true);
		imagecopy($image_1, $image_2, 0, 0, 0, 0, $w, $h);
		imagepng($image_1, str_replace(".png","_filter.png",$img),8);
		@chmod(str_replace(".png","_filter.png",$img),0777);
		return true;
	}
	
	private function resize_crop_image($max_width, $max_height, $source_file, $dst_dir){
		$image = imagecreatefrompng($source_file);
		$filename = $dst_dir;
		$thumb_width = $max_width;
		$thumb_height = $max_height;
		$width = imagesx($image);
		$height = imagesy($image);
		$original_aspect = $width / $height;
		$thumb_aspect = $thumb_width / $thumb_height;
		
		if ( $original_aspect >= $thumb_aspect )
		{
		// If image is wider than thumbnail (in aspect ratio sense)
		$new_height = $thumb_height;
		$new_width = $width / ($height / $thumb_height);
		}
		else
		{
		// If the thumbnail is wider than the image
		$new_width = $thumb_width;
		$new_height = $height / ($width / $thumb_width);
		}
		$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
		// Resize and crop
		imagecopyresampled($thumb,
		$image,
		0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
		0 - ($new_height - $thumb_height) / 2, // Center the image vertically
		0, 0,
		$new_width, $new_height,
		$width, $height);
		imagepng($thumb, $filename, 8); 
		@chmod($filename,0777);
		imagedestroy($thumb);
	}
	
	public function makeVideo($user_key,$image_1_filter,$image_2_filter,$image_3_filter,$id_video_1,$id_video_1,$id_video_1,$id_video_1){

		$URL = _service_video_."make_videos.php";
		$fields = array(
			'act' => urlencode("makevideo"),
			'user_key' => urlencode($user_key),
			'image_1_filter' => urlencode($image_1_filter),
			'image_2_filter' => urlencode($image_2_filter),
			'image_3_filter' => urlencode($image_3_filter)
		);

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$resultat = curl_exec ($ch);
		curl_close($ch);
		$reponse = json_decode($resultat);
		
		if($reponse->err==0){
			//ALL is good
			$url = $this->saveLocalVideo($reponse->video_name);
			$this->video_path = $url;
			$_SESSION["video_mp4"]=$this->video_path;
			$this->deleteVideoDistant($this->video_path);
			$this->saveVideos();
			return true;
		}else{
			return false;
		}
		
	}
	
	private function saveLocalVideo($distant_url){
		$tmp = explode("/","".$distant_url);
		$url_http = _service_video_."videos_generate/".$tmp[count($tmp)-1];
		$destination = dirname(__FILE__)."/../..".$_SESSION["directory"]."/".$tmp[count($tmp)-1];
		$local_destination="/ws".$_SESSION["directory"]."/".$tmp[count($tmp)-1];
		//echo $url_http."<br>";
		//echo $destination."<br>";
		if(file_put_contents($destination, file_get_contents($url_http))){
			@chmod($destination,0777);
			return $local_destination; 
		}else return false;
	}
	
	private function deleteVideoDistant($mp4){
		$tmp = explode("/","".$mp4);
		
		$URL = _service_video_."make_videos.php";
		$fields = array(
			'act' => urlencode("delete_video_generate"),
			'video_name' => urlencode($tmp[count($tmp)-1])
		);

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$resultat = curl_exec ($ch);
		curl_close($ch);
	
	}
	
	private function saveVideos(){
		if($_SESSION["user_key"]!="" && $_SESSION["video_mp4"]!=""){
			if(!$this->checkIfExist($_SESSION["user_key"]) ){
				$query="insert into videos 
				(video_key,img1,img2,img3,mp4,date_ins,etat) 
				values (
				'".addslashes($_SESSION["user_key"])."',
				'".addslashes($_SESSION["image_1"])."',
				'".addslashes($_SESSION["image_2"])."',
				'".addslashes($_SESSION["image_3"])."',
				'".addslashes($_SESSION["video_mp4"])."',
				NOW(),0)";
				$this->dbConnect->execute($query);
			}else{
				$query="update videos set 
				img1='".addslashes($_SESSION["image_1"])."',
				img2='".addslashes($_SESSION["image_2"])."',
				img3='".addslashes($_SESSION["image_3"])."',
				mp4='".addslashes($_SESSION["video_mp4"])."',
				date_ins=NOW(),etat=0 where video_key='".addslashes($_SESSION["user_key"])."'	";
				$this->dbConnect->execute($query);
			}
		}
	}
	
	private function checkIfExist($key){
		$query="select count(id) as tot from videos where video_key='".addslashes($key)."' ";
		$this->dbConnect->select($query);
		$tmp = $this->dbConnect->mergeArray();
		$res = $tmp[0]["tot"];
		if($res>0){
		return true;
		}else{
		return false;
		}
	}
	
	public function getListVideosBacko($etat=1,$page=0, $order="ASC"){
		$limit=_res_par_page_backo_;
		$this->current_page = $page;
		$page=$page-1;
		$query="select * from videos where etat='".intval($etat)."' order by date_ins ".$order;
		if($page>0) $query .= " LIMIT ".$page*$limit.",".$limit;
		if($page<1) $query .= " LIMIT 0,".intval($limit);
		$this->dbConnect->select($query);
		$tmp = $this->dbConnect->mergeArray();
		$this->countTotalRes("where etat='".intval($etat)."'");
		return $tmp;
	}
	
	private function countTotalRes($query_end){
		$query="select count(id) as tot from videos ".$query_end;
		$this->dbConnect->select($query);
		$tmp = $this->dbConnect->mergeArray();
		$this->nb_results_tot=$tmp[0]["tot"];
	}
	
	public function changeEtat($id=0,$etat=0){
		if($id>0){
		$query= "update videos set etat='".intval($etat)."' where id='".intval($id)."' ";
		$this->dbConnect->execute($query);
		}
	}
	
	public function random_video(){
		$query="select mp4 from videos where etat=1 ORDER BY RAND() LIMIT 1";
		$this->dbConnect->select($query);
		$tmp = $this->dbConnect->mergeArray();
		return "".$tmp[0]["mp4"];
	}

	
}
?>