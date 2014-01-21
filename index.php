<?php
	//Page setup/basic information
	$pageinfo = array(
		'title' => 'Home',
		'description' => 'SMU Senior Design Home Page',
		'template' => 'default');
	require("php/setup.php");
	$p = new page($pageinfo);
?>


	<h1>This is where the main page content would go!!!</h1>
	<h6>Okay.</h6>
	
	
<?php
	$p->endpage();
?>