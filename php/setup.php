<?php
	session_start();
	
	ob_start();
	
	function autoloader($class) {
		include 'classes/'.$class.'.class.php';
	}
	
	spl_autoload_register('autoloader');
	
	require "core.php";
	
	//User already logged in??
	$account;
	if(isset($_SESSION['account'])) $account = unserialize($_SESSION['account']);
	else $account = new account();
	
	$p = new page();
	
	//Establish MySQL connection 
	$MySQL = new MySQL();
	
	//Check conditions/do things
	//Form submitted
	if(!empty($_POST)) {
		$form = $_POST['form'];
		if($form=="login") $account->login();
		elseif($form=="register") $account->register();
		elseif($form=="submitproject") project::submit();
	} elseif(!empty($_GET)) {
		if($_GET['logout']=='yes') $account->logout();
	}
?>