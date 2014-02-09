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
				 <li class="list-group-item" id="submitDate">Submitted: <?= dtToDate($project->dt); ?></li>
				 <li class="list-group-item" id="contactNum">Contact #: <?= formatPhoneNumber($project->phoneNumber); ?></li>
			    <li class="list-group-item" id="sponsor">Sponsor: <?= $project->sponsorName; ?></li>
			    <li class="list-group-item" id="projectDescription">Project Description: <br> <?= $project->description; ?></li>
			   	<li class="list-group-item" id="userNeeds">Primary User Needs: <br> <?= $project->userNeeds; ?></li>
			    <li class="list-group-item" id="additionalResources">Additional Resources Provided: <br> <?= $project->resources; ?></li>
			    
			    <?php
			    //List files (If there are any)
				if($project->files != null) {
					echo '<li class="list-group-item" id="radditionalFiles">Files:</li>';
					foreach($project->files as $file) {
						echo '<a href="'.rootDirectory().'uploads/projects/'.$project->id.'/'.$file.'">'.$file.'</a>';
					}
				}
			    
				//Display approval or buttons if not rated yet
				?>  <li class="list-group-item"> <?php
				if($project->approval == '0') {
				    ?>
					   <a href="?approved=1<?= currentURIVars(); ?>"><button type="button" class="btn btn-success">Accept</button></a>
					   <a href="?approved=2<?= currentURIVars(); ?>"><button type="button" class="btn btn-warning">Waitlist</button></a>
					   <a href="?approved=3<?= currentURIVars(); ?>"><button type="button" class="btn btn-danger">Decline</button></a>
				    <?php
				} else {
				    switch ($project->approval) {
					   case '1': 
						  echo "<p>Approved</p>";
						  break;
					   case '2':
						  echo "<p>Waitlisted</p>";
						  break;
					   case '3':
						  echo "<p>Declined</p>";
						  break;
				    }
				}
				?>
				    </li>
			  </ul>
			</div>
		</div>
		<div class="col-lg-1"> </div>
	</div>
</div>