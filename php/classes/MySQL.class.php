<?php
class MySQL {
	var $username = "root"; 
	var $password = "root"; 
	var $host = "localhost"; 
	var $dbname = "smuseniordesign"; 
	
	var $c;
	
	function __construct() {
		try {
			$this->c = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
		} catch(PDOException $ex) {
			die("Failed to connect to the database: " . $ex->getMessage()); 
		}
	}
	
	function query($query,$params) {
		try {
			$stmt = $this->c->prepare($query);
			$result = $stmt->execute($params);
			return $stmt;
		} catch(PDOException $ex) {
			die("Failed to run query: " . $ex->getMessage()); 
		}
	}
}
?>