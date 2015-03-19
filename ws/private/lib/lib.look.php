<?php

class look  {	
	var $content = "";
		

	public function look($id_look=1){
		if(!file_exists(dirname(__FILE__)."/../xml/collection.xml")){
			echo "xml non disponible";
			exit();
		}
		$xml = simplexml_load_file(dirname(__FILE__)."/../xml/collection.xml");	
		$this->content = $xml->look[intval($id_look-1)];
	} 
}
	
?>