<?php
	class page {
		public function __construct() {
			$this->scrapepageinfo();
			$this->templateorder = explode(",",file_get_contents("./templates/".trim($this->template)));
			foreach($this->templateorder as $n) {
				if($n == "content") break;
				else include_once("./components/".$n.".php");
			}
		}
		
		function endpage() {
			$initialkey = array_search("content",$this->templateorder) + 1;
			$arraylength = count($this->templateorder);
			for($i = $initialkey; $i<$arraylength; $i++) {
				include_once("./components/".$this->templateorder[$i].".php");
			}
			
		}
		
		function scrapepageinfo() {
			preg_match('~/[^/]*$~',$_SERVER['PHP_SELF'],$self);
			$self = '.'.$self[0];
			$contents = file_get_contents($self);
			preg_match('/(%%%).*(%%%)/s',$contents,$fileheader);
			$fileheader = str_replace(array('\r','\n','\t'),'',$fileheader[0]);
			//NEED TO FIX THIS REGEX TO NOT INCLUDE THE "~ "!!!!
			preg_match_all('/((~ ).*?(?=~))|((~ ).*?(?=%%%))/s',$fileheader,$entries,PREG_SET_ORDER);	
			foreach($entries as $i) {
				$i = str_replace(array('~ ','\t','\n','\r'),'',$i[0]);
				preg_match('/.*(?=: )/',$i,$key);
				preg_match('/(?<=: ).*/',$i,$value);
				$key = strtolower($key[0]);
				$this->$key = $value[0];
			}
		}
	}
?>