<?php
$URL = "http://10.10.25.174/ws/";

function wsCall($fields){
		global $URL;

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$resultat = curl_exec ($ch);
		curl_close($ch);
		return json_decode($resultat);
}

?>