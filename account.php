<!--
	%%%
	~ Title: Account
	~ Description: Account Details
	~ Template: default
	%%%
-->

<?php 
	if(!$account->logged) {
		header("Location: login.php");
		die("Redirecting to login.php");
	} else {
		echo "<p>Account ID: ".$account->id."</p>";
		echo "<p>Email: ".$account->email."</p>";
		echo "<p>Roles:</p><ul>";
		foreach($account->roles as $name=>$perms) {
			echo "<li>$name</li>";
		}
		echo "</ul>";
		echo "<p>Permissions: </p><ul>";
		foreach($account->roles as $name=>$perms) {
			echo "<li>$name<ul>";
			foreach($perms->permissions as $name=>$value) {
				echo "<li>$name</li>";
			}			
			echo "</ul></li>";
		}
		echo "</ul>";
	}
?>