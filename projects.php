<!--
	%%%
	~ Title: Projects
	~ Description: Project listings page
	~ Template: default
	~ Login: yes
	%%%
-->
<div class='container'>
	<div class='row'>
		<br>
		<br>
		<div class="col-lg-1"> </div>
		<div class="col-lg-10">

			<div class="sort">
				<ul class="nav nav-tabs">
					<li
						<?php if(!isset($_GET['approval'])) echo 'class="active"'; ?>
					><a href="projects.php">All projects</a></li>
					<li
						<?php if(isset($_GET['approval']) && $_GET['approval'] == 1) echo 'class="active"'; ?>
					><a href="?approval=1">Approved projects</a></li>
					<li 
						<?php if(isset($_GET['approval']) && $_GET['approval'] == 2) echo 'class="active"'; ?>
					><a href="?approval=2">Waitlisted projects</a></li>
					<li 
						<?php if(isset($_GET['approval']) && $_GET['approval'] == 3) echo 'class="active"'; ?>
					><a href="?approval=3">Denied projects</a></li>
				</ul>
			</div>
	<?php
		new paginator();

		//Get an array of the products on the current page
		$projects = project::getProjects();		
		
		//Display all the projects on this page
		foreach ($projects as $project) {
			?>
		<a href="project.php?id=<?= $project['project_id']; ?>">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="project.php?id=<?= $project['project_id']; ?>">
						<h3 class="panel-title"><?= $project['title']; ?></h3>
						<strong><?= $project['project_id']; ?></strong>
					</a>
		    	</div>
		    	<div class="panel-body">
					
			    <p class="projectDescription"><b>Submission Date: </b> <?= dtToDate($project['dt']); ?></p>
					<p class="projectDescription"><b>Sponsor: </b> <?= $project['sponsorName']; ?></p>
					<p><?= $project['description']; ?></p>
				
				</div>
			</div>
		</a>
			<?php
		}
	?>

		</div>
		<div class="col-lg-1"> </div>
	</div>
</div>