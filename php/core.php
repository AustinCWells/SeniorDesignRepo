<?php
	//Notices/Errors
	$notices = array();
	$errors = array();
	
	function scrapepageinfo() {
		$self = ".".$_SERVER['PHP_SELF'];
		$contents = file_get_contents($self);
		preg_match('/(%%%).*(%%%)/s',$contents,$fileheader);
		$fileheader = str_replace(array('\r','\n','\t'),'',$fileheader[0]);
		var_dump($fileheader);
		preg_match_all('/((~).*?(?=~))|((~ ).*?(?=%%%))/s',$fileheader,$entries,PREG_SET_ORDER);
		var_dump($entries);
	}
?>