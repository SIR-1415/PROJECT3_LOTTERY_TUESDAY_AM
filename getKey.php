<?php
	include "CLotto.php";
	// defeito
	
	$f = "json";
	
	if(isset($_GET["format"])) {
		if ($_GET["format"] == "xml") {
			$f = "xml";
		}
	}
	
	$newKey = new CLotto();
	
	if ($f == "xml") {
		header("Content-Type:application/xml");
		echo $newKey->asXML();
	} else {
		header("Content-Type:application/json");
		echo $newKey->asJSON();	
	}
	
?>