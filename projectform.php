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
						<form role="form" action="projectform.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							<label for="sponsorName">Project Title</label>
							<abbr title="The title of your project. (Example: Out-Of-Stock Inventory Modeling Tool"><i class="fa fa-question help"></i></abbr>
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter name">
							</div>
							<div class="form-group">
							<label for="sponsorName">Sponsor Name</label>
							<abbr title="The name of the sponsoring company. (Example: Microsoft"><i class="fa fa-question help"></i></abbr>
							<input type="text" class="form-control" id="sponsorName" name="sponsorName" placeholder="Enter name">
							</div>
							<div class="form-group">
							<label for="phoneNumber">Contact Number</label>
							<abbr title="Number you can be contacted by if any additional information is required"><i class="fa fa-question help"></i></abbr>
							<input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter number">
							</div>
							<div class="form-group">
							<label for="phoneNumber">Contact Email</label>
							<abbr title="Email you can be contaced by if any additional information is required"><i class="fa fa-question help"></i></abbr>
							<input type="tel" class="form-control" id="email" name="email" placeholder="Enter email">
							</div>

							<div class="form-group">
							<label for="sponsorName" rows="4" cols="50">Project Description</label>
							<abbr title="Description of the project, feel free to include background, significance, approach, aims, expected outcomes, or any other additional information."><i class="fa fa-question help"></i></abbr>
							<textarea class="form-control" name="description" rows="3"></textarea>
							</div>
							<div class="form-group">
							<label for="phoneNumber" rows="4" cols="50">Primary User Needs </label>
							<abbr title="Who is the project intended for, what are their particular needs (Example: child friendly, used by the elderly, etc."><i class="fa fa-question help"></i></abbr>
							<textarea class="form-control" name="userNeeds" rows="3"></textarea>
							</div>

							<div class="form-group">
							<label for="phoneNumber">Provided Budget</label>
							<abbr title="The monetary budget provided by the sponsor"><i class="fa fa-question help"></i></abbr>
							<input type="tel" class="form-control" id="phoneNumber" name="budget" placeholder="Enter number">
							</div>

							<div class="form-group">
							<label for="phoneNumber" rows="4" cols="50">Additional Resources</label>
							<abbr title="Additional non monetary resources provided by the sponsor (Example: mentors, tools, hardware supplies)"><i class="fa fa-question help"></i></abbr>
							<textarea class="form-control" name="resources" rows="3"></textarea>
							</div>

							<div class="form-group">
							<label for="exampleInputFile">Upload files</label>
							<abbr title="Any addition files that that will assist with the decision process (Example: .pdf, project images, etc."><i class="fa fa-question help"></i></abbr>
							<input type="file" class="multifile" name="files[]" multiple>
							</div>	
							
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
				<h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
				<p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- r wrap -->


<!-- FOOTER -->
<div id="f">
	<div class="container">
		<div class="row centered">
			<a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>
	
		</div><!-- row -->
	</div><!-- container -->
</div><!-- Footer -->


<!-- MODAL FOR CONTACT -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  <h4 class="modal-title" id="myModalLabel">contact us</h4>
	</div>
	<div class="modal-body">
		  <div class="row centered">
			<p>We are available 24/7, so don't hesitate to contact us.</p>
			<p>
				Somestreet Ave, 987<br/>
					London, UK.<br/>
					+44 8948-4343<br/>
					hi@blacktie.co
			</p>
			<div id="mapwrap">
	<iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=52.752693,22.791016&amp;spn=67.34552,156.972656&amp;z=2&amp;output=embed"></iframe>
				</div>	
		  </div>
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Save & Go</button>
	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

