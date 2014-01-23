<?php
	//Notices/Errors
	$notices = array();
	$errors = array();
	
	function scrapepageinfo() {
		$self = ".".$_SERVER['PHP_SELF'];
		$contents = file_get_contents($self);
		preg_match('/(%%%).*(%%%)/s',$contents,$fileheader);
		$fileheader = str_replace(array('\r','\n','\t'),'',$fileheader[0]);
		//NEED TO FIX THIS REGEX TO NOT INCLUDE THE "~ "!!!!
		preg_match_all('/((~ ).*?(?=~))|((~ ).*?(?=%%%))/s',$fileheader,$entries,PREG_SET_ORDER);	
		$fileinfo = array();
		foreach($entries as $i) {
			$i = str_replace(array('~ ','\t','\n','\r'),'',$i[0]);
			preg_match('/.*(?=: )/',$i,$key);
			preg_match('/(?<=: ).*/',$i,$value);
			$fileinfo[$key[0]] = $value[0];
		}
	}
?>