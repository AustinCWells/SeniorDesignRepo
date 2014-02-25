<!--
	%%%
	~ Title: Project
	~ Description: SMU Senior Design Project Page
	~ Template: default
	~ Login: yes
	%%%
-->

<?php
	if(isset($_GET['approved'])) {
		project::setApproval($_GET['approved'],$_GET['id']);
	}
	$project = project::getProject($_GET['id']);
?>
<div class="container">
	<div class='row'>
		<br>
		<br>
		<div class="col-lg-1"> </div>
		<div class="col-lg-10">
			<div class="panel panel-primary <?php
				switch ($project->approval) {
				   case '1':
					  echo "approved";
					  break;
				   case '2':
					  echo "waitlisted";
					  break;
				   case '3':
					  echo "declined";
					  break;
				}
			?>">
			  <!-- Default panel contents -->
			  <div class="panel-heading <?php
				switch ($project->approval) {
				   case '1':
					  echo "approved";
					  break;
				   case '2':
					  echo "waitlisted";
					  break;
				   case '3':
					  echo "declined";
					  break;
				}
			?>" id="projectTitle" onclick="goBack()"><i class="fa fa-angle-double-left backLogo" > </i><?= $project->title; ?></div>


			<script>
			function goBack()
			  {
			  window.history.back()
			  }
			</script>

			  <!-- List group -->
			  <ul class="list-group">
				 <li class="list-group-item" id="submitDate">Submitted: <?= dtToDate($project->dt); ?></li>
				 <li class="list-group-item" id="contactNum">Contact #: <?= formatPhoneNumber($project->phoneNumber); ?></li>
			    <li class="list-group-item" id="sponsor">Sponsor: <?= $project->sponsorName; ?></li>
			    <li class="list-group-item" id="projectDescription">Project Description: <br> <?= $project->description; ?></li>
			   	<li class="list-group-item" id="goalOne">Goal One: <br> <?= $project->goalOne; ?></li>
			   	<li class="list-group-item" id="goalTwo">Goal Two: <br> <?= $project->goalTwo; ?></li>
			   	<li class="list-group-item" id="goalThree">Goal Three: <br> <?= $project->goalThree; ?></li>
			    <li class="list-group-item" id="additionalResources">Additional Resources Provided: <br> <?= $project->resources; ?></li>

			    <?php
			    //List files (If there are any)
				if($project->files != null) {
					echo '<li class="list-group-item" id="radditionalFiles">Files:';
					foreach($project->files as $file) {
						echo '<a class="projectFiles" href="'.rootDirectory().'uploads/projects/'.$project->id.'/'.$file.'">'.$file.'</a>';
					}
					echo '</li>';
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
					?> <a href="?approved=0<?= currentURIVars(); ?>"><button type="button" class="btn btn-dange">Revert Decision</button></a> <?php
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
