<!--
	%%%
	~ Title: Submit Proposal
	~ Description: Project submission form
	~ Template: default
	%%%
-->
<div id="blue">
	<div class="container">
		<div class="row centered">
			<div class="col-lg-8 col-lg-offset-2">
			<h4>LEARN MORE ABOUT US</h4>
			<p>WE ARE COOL PEOPLE</p>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</div><!--  bluewrap -->

<!-- Form -->
<div class="container w">
		<div class="row">
			<br>
			<div class="col-lg-2">
			</div>
				<div class="col-lg-8">
					<div class="well">
						<form role="form" ID="projectForm" action="projectform.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<legend>Sponsor Info</legend>
								<div class="input-group">
									<span class="input-group-addon">Company Name   </span>
									<input type="text" class="form-control" id="sponsorName" name="sponsorName" placeholder="Company Inc.">
								</div>
								<div class="input-group">
									<span class="input-group-addon">Contact Person </span>
									<input type="text" class="form-control" id="contactPerson" name="contactPerson" placeholder="John Doe" >
								</div>
								<div class="input-group">
									<span class="input-group-addon">Contact Number </span>
									<input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="(###) ###-####">
								</div>
								<div class="input-group">
									<span class="input-group-addon">Contact Email  </span>
									<input type="tel" class="form-control" id="email" name="email" placeholder="JohnDoe@email.com">
								</div>
							</fieldset>

							<fieldset>
								<legend>Project Information</legend>
								<div class="form-group">
									<label for="title">Provide a descriptive project title.</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="">
								</div>
								<div class="form-group">
									<label for="description">Give a description of the project. Be as detailed as necessary. </label>
									<textarea class="form-control" name="description" rows="3"></textarea>
								</div>

								<label> List the top three goals the project is meant to accomplish. </label>
								<div class="input-group">
									<span class="input-group-addon" for="goalOne"> 1  </span>
									<textarea class="form-control" name="goalOne" rows="2"></textarea>
								</div>
								<div class="input-group">
									<span class="input-group-addon" for="goalTwo"> 2  </span>
									<textarea class="form-control" name="goalTwo" rows="2"></textarea>
								</div>
								<div class="input-group">
									<span class="input-group-addon" for="goalThree"> 3  </span>
									<textarea class="form-control" name="goalThree" rows="2"></textarea>
								</div>
							</fieldset>

							<fieldset>
								<legend>Project Resources </legend>
								<div class="input-group">
								<span class="input-group-addon">Provided Budget </span>
								<input type="tel" class="form-control" id="phoneNumber" name="budget" placeholder="">
								  <span class="input-group-addon">.00</span>
								</div>
								<div class="form-group">
								<label for="phoneNumber" rows="4" cols="50">List any additional resources you would provide. i.e. dedicated mentors, hardware, software, etc.</label>
								<textarea class="form-control" name="resources" rows="3"></textarea>
								</div>
							</fieldset>

							<fieldset>
								<legend>Additional Information </legend>
								<div class="form-group">
								<label for="phoneNumber" rows="4" cols="50">List any additional information you feel will be relevent to the project</label>
								<textarea class="form-control" name="additionalInfo" rows="3"></textarea>
								</div>
								<div class="form-group">
								<label for="exampleInputFile">Attach any files related to the project.</label>
								<input type="file" class="multifile" name="files[]" multiple>
								</div>
							</fieldset>
						  <button type="submit" class="btn btn-default">Submit</button>
						  <input type="hidden" name="form" value="submitproject">

						</div><!-- well -->
					</form>
				</div><!-- col-lg-8 -->
			<div class="col-lg-2">
			</div>

		</div><!-- row -->

	<br>
	<br>
</div><!-- container -->




<div id="r">
	<div class="container">
		<div class="row centered">
			<div class="col-lg-8 col-lg-offset-2">
				<h4>WE ARE THE LYLE SCHOOL OF ENGINEERING. WE BUILD COOL THINGS THAT WORK.</h4>
				<p>Based in Dallas Texas, we believe the best way to learn is by doing. This is why we team our engineers with industry experts to solve real world problems. By giving our Lyle students the chance to experience real world problem solving we give them one of a kind of experience that helps them develop the skills needed to perform above and beyond other college graduates.</p>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- r wrap -->


<!-- FOOTER -->
<div id="f">
	<div class="container">
		<div class="row centered">

		</div><!-- row -->
	</div><!-- container -->
</div><!-- Footer -->


