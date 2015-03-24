<?php
/**************************************************************/
// AMA : 19/02/2015
/**************************************************************/
class einvitations  {
	
	public $db_connect="";
	public $db_error="";
	public $current_resultat="";
	public $generate_invitation="";
	public $last_id=0;
	
	/********************************************************/
	// Class constructor, instanciate BDD
	/********************************************************/

	public function einvitations($name="",$tel="") {
		global $dbConnect;
		$this->dbConnect = $dbConnect;
		if($name!=""){
			$query="insert into einvitations (name,tel,date_ins) values (
			'".addslashes($name)."',
			'".addslashes($tel)."',
			NOW()
			)"; 
			$this->dbConnect->execute($query); 
			$this->last_id = $this->dbConnect->lastId();
		}
	}
	
	public function makeinvit($name,$id){
		$src = imagecreatefrompng(dirname(__FILE__)."/../../invitations_templates/einvitation.png");
		$font = dirname(__FILE__)."/../../invitations_templates/ARIALUNI.TTF";
		

		$black = imagecolorallocate($src, 0, 0, 0);
		$white = imagecolorallocate($src, 255, 255, 255);
		$red = imagecolorallocate($src, 190, 23, 49);
		
		$tb = imagettfbbox(17, 0, $font, $name);
		$x = ceil((750 - $tb[2]) / 2); // lower left X coordinate for text
		$y=836;
		imagettftext($src, 17, 0, $x, $y, $white, $font, $name); // write text to image
		
		// Output to browser
		header('Content-Type: image/jpeg');
		$sortie="upload/invitations/invitation_Vuitton_".date("YmdHis")."_".intval($id).".jpg";
		imagejpeg($src,dirname(__FILE__)."/../../".$sortie,90);
		imagedestroy($src);
		return $sortie;
		
	}
	
}
?>