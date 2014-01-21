<?php
	$username = "root"; 
	$password = "root"; 
	$host = "localhost"; 
	$dbname = "smuseniordesign"; 
	try {
		$db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
	} catch(PDOException $ex) {
		die("Failed to connect to the database: " . $ex->getMessage()); 
	}
	
	function runquery($query,$params) {
		try {
			$stmt = $db->prepare($query);
			$result = $stmt->execute($query_params);
			return $stmt;
		} catch(PDOException $ex) {
			die("Failed to run query: " . $ex->getMessage()); 
		}
	}
?>