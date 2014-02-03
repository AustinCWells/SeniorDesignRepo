<!--
	%%%
	~ Title: Project
	~ Description: SMU Senior Design Project Page
	~ Template: default
	~ Login: yes
	%%%
-->

<?php
	$project = project::getProject($_GET['id']);
?>
<div class="container"> 
	<div class='row'>
		<br>
		<br>
		<div class="col-lg-1"> </div>
		<div class="col-lg-10">
			<div class="panel panel-primary">
			  <!-- Default panel contents -->
			  <div class="panel-heading" id="projectTitle"><?= $project->title; ?></div>


			  <!-- List group -->
			  <ul class="list-group">
			    <li class="list-group-item" id="submitDate">Submitted: <?= $project->dt; ?></li>
			    <li class="list-group-item" id="contactNum">Contact # <?= $project->phoneNumber; ?></li>
			    <li class="list-group-item" id="sponsor">Sponsor: <?= $project->sponsorName; ?></li>
			    <li class="list-group-item" id="projectDescription">Project Description: <br> <?= $project->description; ?></li>
			   	<li class="list-group-item" id="userNeeds">Primary User Needs: <br> <?= $project->userNeeds; ?></li>
			    <li class="list-group-item" id="additionalResources">Additional Resources Provided: <br> <?= $project->resources; ?></li>
			    
			    <?php
				if($project->files != null) {
					echo '<li class="list-group-item" id="radditionalFiles">Files:</li>';
					foreach($project->files as $file) {
						echo '<a href="/uploads/projects/'.$project->id.'/'.$file.'">'.$file.'</a>';
					}
				}
			    ?>
			    
			    <li class="list-group-item">
					<button type="button" class="btn btn-success">Accept</button>
					<button type="button" class="btn btn-warning">Waitlist</button>
					<button type="button" class="btn btn-danger">Decline</button>
					
			    </li>
			  </ul>
			</div>
		</div>
		<div class="col-lg-1"> </div>
	</div>
</div>