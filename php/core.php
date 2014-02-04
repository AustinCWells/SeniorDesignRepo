<?php
	function dtToDate($dt) {
	    return date("m/d/Y",strtotime($dt));
	}
	
	function formatPhoneNumber($num) {
	   preg_match( '/(\d{3})(\d{3})(\d{4})$/',$num,$matches);
	   $result = '('.$matches[1].') '.$matches[2].'-'.$matches[3];
	   return $result;
	}
	
	function currentURIVars() {
	   if($_SERVER['QUERY_STRING'] != ''){ 
		  $vars = preg_replace('/&page=\d+/','','&'.$_SERVER['QUERY_STRING']);
		  return $vars;
	   } else return '';
	}
?>