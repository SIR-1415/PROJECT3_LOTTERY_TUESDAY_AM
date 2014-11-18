<?php
class CKey {
	public $numbers;
	public $stars;
}

class CLotto {
	
	const MINN = 1;
	const MAXN = 50;
	const MINS = 1;
	const MAXS = 11;
	
	const DNN = 5;
	const DNS = 2;
	
	//public $numbers;
	//public $stars;
	 public $key;
	
	private $bag;
	
	function __construct() {
		$this->key = new CKey();
		
		$this->bag = range(self::MINN,self::MAXN);
		$this->key->numbers = $this->extractor($this->bag,self::DNN);
		//var_dump($this->bag);
		$this->bag = range(self::MINS,self::MAXS);
		$this->key->stars = $this->extractor($this->bag,self::DNS);
	}
	
	function extractor($bagOfNumbers,$n) {
		$extraction = array();
		
		for($i=0; $i<$n; $i++) {
			$random_idx = rand(0,count($bagOfNumbers)-1);
			
			$extraction[] = $bagOfNumbers[$random_idx];
			array_splice($bagOfNumbers,$random_idx,1);
			
			//$x = array_splice($bagOfNumbers,$random_idx,1);
			//$extraction[] = $x[0];
			
			
		}
		sort($extraction, SORT_NUMERIC);
		return $extraction;
	}
	
	function asJSON() {
		return json_encode($this->key);
	}
	
	function asXML() {
		$xmlkey = new SimpleXMLElement("<key/>");
		$noden = $xmlkey->addChild("numbers");
		$nodes = $xmlkey->addChild("stars");
		
		foreach($this->key->numbers as $number) {
			$noden->addChild("ke",$number);
		}
				
		foreach($this->key->stars as $star) {
			$nodes->addChild("ke",$star);
		}
		
		return $xmlkey->asXML();
	}
	
}
/*
$l = new CLotto();
echo $l->asJSON();
echo $l->asXML(); 
*/

?>