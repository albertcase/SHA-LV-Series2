<?php
/**************************************************************/
// Classe de connection a la BDD, ici postgress
// Cette Classe devra contenir les requetes du site afin
// de facilité le changement de BDD si nécessaire
// AMA : 24/04/2008
/**************************************************************/
class bdd_connect  {
	
	public $db_connect="";
	public $db_error="";
	public $current_resultat="";
	
	/********************************************************/
	// constructeur de classe, instancie de la bdd
	/********************************************************/

	public function __construct() {

	$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect(_dbhost_,  _dbuser_,  _dbpassword_));
	if (!$link)  die('Impossible de se connecter : ' . mysqli_error($GLOBALS["___mysqli_ston"]));
	$db_selected = mysqli_select_db($link, constant('_dbname_'));
	if (!$db_selected) die ('Impossible de sélectionner la base de données : ' . mysqli_error($GLOBALS["___mysqli_ston"]));
	((bool)mysqli_set_charset($link, "utf8"));
	//mysql_query("SET NAMES 'utf8'");
	$this->db_connect = $link;


	}
	function lastId(){
		return ((is_null($___mysqli_res = mysqli_insert_id($this->db_connect))) ? false : $___mysqli_res);
	}
	/********************************************************/
	// clos la connexion
	/********************************************************/
	
	public function close(){
			((is_null($___mysqli_res = mysqli_close($this->db_connect))) ? false : $___mysqli_res);
	}
	
	/**************************************************************/
	// fait des select sur la bdd et renvoie le resultat //
	/*************************************************************/
	public function select($query=""){
		if($query){
			$this->current_resultat = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die($this->db_error = 'Echec de la requête: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
			return true;
		}else{
			return false;
		}
	}
	
	/**************************************************************/
	// execute une requete insert ou update	//
	/*************************************************************/
	public function execute($query=""){
		if($query){
			$this->current_resultat = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die($this->db_error = 'Echec de la requête: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
			return true;
		}else{
			return false;
		}
	}
	
	//***********************************************************/
	//curseur sur resultat select
	//***********************************************************/
	public function next(){
		if($this->current_resultat){
			return mysqli_fetch_array($this->current_resultat,  MYSQLI_ASSOC);
		}else{
			return false;
		}
	}
	
	//**********************************************************/
	// renvoi un tableau associatif des resultats
	//**********************************************************/
	public function mergeArray(){
		if($this->current_resultat){
			$i=0;
			while ($row = mysqli_fetch_array($this->current_resultat,  MYSQLI_ASSOC)) {
				$sortie[$i] = $row;
				$i++;
			}
			return $sortie;
		}else{
			return false;
		}
	}

	//**********************************************************/
	//place des addslashes sur les données tableau
	//**********************************************************/
	public function addslashesArray($tableau)	{
		foreach($tableau as $key => $value)
			$tableau[$key]=addslashes($value);
			
		return $tableau;
	}
	
	public function nbJoursVSnow($date1){
		if($date1!=""){
		//format 1 : yyyy-mm-dd hh:ii:ss
		$tmp1=explode(" ",$date1);
		$d = explode("-",$tmp1[0]);
		$t = explode(":",$tmp1[1]);
		$mt = mktime($t[0],$t[1],$t[2],$d[1],$d[2],$d[0]);
		$act = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
			return intval(($act-$mt)/86400);
		}else{
			return 0;
		}
	}
	
}
?>