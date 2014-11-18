<?php
class CLotto {
	
	const MINN = 1;
	const MAXN = 50;
	const MINS = 1;
	const MAXS = 11;
	
	const DNN = 5;
	const DNS = 2;
	
	public $numbers;
	public $stars;
	
	private $bag;
	
	function __construct() {
		
		$this->bag = range(self::MINN,self::MAXN);
		$this->extractor($this->bag,self::DNN);
		//var_dump($this->bag);
	}
	
	function extractor($bagOfNumbers,$n) {
		$extraction = array();
		
		for($i=0; $i<$n; $i++) {
			$random_idx = rand(0,count($bagOfNumbers)-1);
			echo($random_idx);
			$x = array_splice($bagOfNumbers,$random_idx,1);
			$extraction[] = $x[0];
			var_dump($extraction);
			echo("<hr/>");
		}
		
	}
	
}

//debug

$l = new CLotto();

?>