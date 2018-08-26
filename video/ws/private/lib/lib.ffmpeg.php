<?php
/**************************************************************/
// AMA : 17/02/2015
/**************************************************************/
class ffmpeg  {
	
	public $err_msg="";
	public $img_path="";
	public $img_path_filter="";
	
	/********************************************************/
	// Class constructor, instanciate BDD
	/********************************************************/

	public function ffmpeg() {}
	
	public function makeVideo($id_video,$image1,$image2,$image3){
		$image=array($image1,$image2,$image3);
		$videos[0] = array("nb_video"=>10);
		$videos[1] = array("nb_video"=>10);
		$videos[2] = array("nb_video"=>10);
		$videos[3] = array("nb_video"=>10);
		
		//recuperation des images depuis l'autre serveur
		//$local_image contient les images local
		foreach($image as $k => $v ){$local_image[$k] = $this->saveLocalImage($v);}
		
		//tirage aléatoire des 4 vidéos
		//$local_image contient les images local
		foreach($videos as $k => $v){$videos_id[$k]=$this->makeVideoRand($v);}
			
		//verification de l'existence des .ts
		foreach($videos_id as $k => $v){
			$chemin = dirname(__FILE__)."/../../videos_template/boucles".($k+1)."/".$v.".ts";
			$videos_final[$k]=$chemin;
			if(!file_exists($chemin)){				
				//echo "NOT EXIST - ".$chemin."<br>";
				$this->makeTSfromMP4($chemin);
			}
		}
		//concatenation 4ts + 3 png + mp3
		return $this->makeConcat($local_image,$videos_final,$id_video);
	}
	
	private function saveLocalImage($img){
		$tmp = explode("/","".$img);
		$destination = dirname(__FILE__)."/../../upload/".$tmp[count($tmp)-1];
		$source = _front_http_.$img;
		if(file_put_contents($destination, file_get_contents($source)))	return $destination; else return false;
	}
	
	private function makeVideoRand ($infos_video) {
		return rand(1,$infos_video["nb_video"]);
	}
	
	private function makeTSfromMP4($video){
		//exec(_ffmpeg_path_.' -i '.str_replace(".ts",".mp4",$video).' -f mpegts '.$video." 2>&1",$output);
		exec(_ffmpeg_path_.' -i '.str_replace(".ts",".mp4",$video).' -codec:v mpeg2video -qscale:v 2 '.$video." 2>&1",$output);
		
		@chmod(str_replace(".ts",".mp4",$video), 0777);
	}
	
	private function makeConcat($images,$videos,$id_video){
		//concatenation de la liste des vidéos format : $concat="concat:videos/ts/1.ts|videos/ts/2.ts|videos/ts/3.ts|videos/ts/4.ts|videos/ts/5.ts|videos/ts/6.ts|img1.ts";
		
		//************************************//
		//generation des .ts pour les 3 images
		//************************************//
		foreach($images as $k=>$v){
			$videos_image[$k]=str_replace(".png",".ts",$v);
			//convertion en jpg car codec png nr fonctionne pas
			$this->png2jpg($v,str_replace(".png",".jpg",$v),80);
			//make video ts
			@exec(_ffmpeg_path_.' -y -loop 1  -i '.str_replace(".png",".jpg",$v).' -t 0.333333 '.$videos_image[$k]." 2>&1",$output);
			//var_dump($output);
			@chmod($videos_image[$k], 0777);
			//ici on peut supprimer les images du serveur plus besoin ...
			$this->suppImage($v);
			
		}
		
		//**************************************************************//
		//creation d'un tableau contenant l'ensemble des TS a concatener
		//**************************************************************//
		foreach($videos as $k=>$v){
			$concat_array[count($concat_array)]=$v;
			if($videos_image[$k]!="") $concat_array[count($concat_array)]=$videos_image[$k];
		}
				
		//concatenation de la liste des vidéos format : $concat="concat:videos/ts/1.ts|videos/ts/2.ts|videos/ts/3.ts|videos/ts/4.ts|videos/ts/5.ts|videos/ts/6.ts|img1.ts";
		$concat="concat:";
		foreach($concat_array as $k => $v) $concat.="".$v."|";
		$concat=substr($concat,0,strlen($concat)-1);
		
		//**************************************************************//
		//generation du ".ts" master
		//**************************************************************//
		$mp3 = dirname(__FILE__)."/../../videos_template/bandeson.mp3";
		$directory_sortie = dirname(__FILE__)."/../../videos_generate";
		exec(_ffmpeg_path_.' -y -i '.$mp3.' -i "'.$concat.'" -c copy '.$directory_sortie.'/'.$id_video.'.ts');
		
		//suppression des .ts intermediaire
		foreach($videos_image as $k=>$v) $this->suppImage($v);
		
		//**************************************************************//
		//generation du h264 encapsulé en mp4 master
		//**************************************************************//
		$output="";
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -vcodec mpeg4 -acodec aac -strict -2 -r 12 '.$directory_sortie.'/'.$id_video.'_1.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -acodec aac -strict -2 -vcodec mpeg4 -qscale:v 1 -r 15 -vf scale=320:570 '.$directory_sortie.'/'.$id_video.'_q1.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -acodec aac -strict -2 -vcodec mpeg4 -qscale:v 10 -r 15 -vf scale=320:570 '.$directory_sortie.'/'.$id_video.'_q10.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -acodec aac -strict -2 -vcodec mpeg4 -qscale:v 20 -r 15 -vf scale=320:570 '.$directory_sortie.'/'.$id_video.'_q20.mp4'." 2>&1",$output);
		var_dump(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -c:v libx264 -acodec aac -strict -2 -r 18 -b:v 640k '.$directory_sortie.'/'.$id_video.'_q10.mp4'." 2>&1");exit;
		exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -c:v libx264 -acodec aac -strict -2 -r 18 -b:v 640k '.$directory_sortie.'/'.$id_video.'_q10.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -s qvga -b:a 384k -vcodec libx264 -r 23.976 -acodec libfaac -ac 2 -ar 44100 -ab 64k -deinterlace '.$directory_sortie.'/'.$id_video.'_2.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i  -c:v libx264 -crf 20 -maxrate 400k'.$directory_sortie.'/'.$id_video.'_3.mp4'." 2>&1",$output);
		//exec(_ffmpeg_path_.' -y -i '.$directory_sortie.'/'.$id_video.'.ts -vcodec libx264 -vpre hq -b 5000k '.$directory_sortie.'/'.$id_video.'_q10.mp4'." 2>&1",$output);
		//var_dump($output);
		$this->suppImage($directory_sortie.'/'.$id_video.'.ts');
		
		return $directory_sortie.'/'.$id_video.'_q10.mp4';
		
	}
	
	private function png2jpg($originalFile, $outputFile, $quality) {
		$image = imagecreatefrompng($originalFile);
		imagejpeg($image, $outputFile, $quality);
		imagedestroy($image);
	}
	
	private function suppImage($img){
		@unlink($img);
		@unlink(str_replace(".png",".jpg",$img));
	}
	
	public function suppVideo ($file){
		$file=dirname(__FILE__)."/../../videos_generate/".$file;
		//@unlink($file);
	}
	
	
	
}
?>