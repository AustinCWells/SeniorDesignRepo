<!--
	%%%
	~ Title: Projects
	~ Description: Project listings page
	~ Template: default
	~ Login: yes
	%%%
-->
<div class='row'>
	<br>
	<br>
	<div class="col-lg-1"> </div>
	<div class="col-lg-10">

<?php
	new paginator();

	//Get an array of the products on the current page
	$projects = project::getProjects();
	
	//Display all the projects on this page
	foreach ($projects as $project) {
		?>

	<div class="panel panel-default">
		<div class="panel-heading">
    		<h3 class="panel-title"><?= $project['title']; ?></h3>
    	</div>
    	<div class="panel-body">
			<a href="project.php?id=<?= $project['project_id']; ?>">
				<strong><?= $project['project_id']; ?></strong>
			</a>
			<p><?= $project['sponsorName']; ?></p>
			<p><?= $project['phoneNumber']; ?></p>
			<p><?= $project['email']; ?></p>
			<p><?= $project['description']; ?></p>
			<p><?= $project['userNeeds']; ?></p>
			<p><?= $project['budget']; ?></p>
			<p><?= $project['resources']; ?></p>
			<p><?= $project['dt']; ?></p>
		</div>
	</div>
		<?php
	}
?>

	</div>
	<div class="col-lg-1"> </div>
</div>