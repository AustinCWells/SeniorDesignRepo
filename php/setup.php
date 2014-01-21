<?php
	session_start();
	
	require "mysqlconnect.php";
	require "login.php";
	require "RBAC.php";
	require "core.php";
	
	$account = new account();
	
	//Check conditions/do things
	//Form submitted
	if(!empty($_POST)) {
		$form = $_POST['form'];
		if($form=="login") login();
		elseif($form=="register") register();
		elseif($form=="submitproject") submitproject();
	}
?>