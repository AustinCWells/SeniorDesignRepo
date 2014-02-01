<!--
	%%%
	~ Title: Projects
	~ Description: Project listings page
	~ Template: default
	~ Login: yes
	%%%
-->

<?php
	new paginator();

	//Get an array of the products on the current page
	$projects = project::getProjects();
	
	//Display all the projects on this page
	foreach ($projects as $project) {
		?>
			<h3><?= $project['title']; ?></h3>
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
		<?php
	}
?>