<?php
	header("Access-Control-Allow-Origin: *");
	include "CLotto.php";
	// defeito
	
	$f = "error";
	
	if(isset($_GET["format"])) {
		if ($_GET["format"] == "xml") {
			$f = "xml";
		} else if ($_GET["format"] == "json") {
			$f = "json";
		}
	}
	
	$newKey = new CLotto();
	
	if ($f == "xml") {
		header("Content-Type:application/xml");
		echo $newKey->asXML();
	} else if ($f == "xml") {
		header("Content-Type:application/json");
		echo $newKey->asJSON();	
	} else {
		http_response_code(400);
	}
	
?>