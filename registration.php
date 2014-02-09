<!--
	%%%
	~ Title: Login
	~ Description: Log in to SMU Senior Design
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
			<div class="col-lg-4">
			</div>
				<div class="col-lg-4">
					<form class="form-horizontal" role="form" action="registration.php" method="post">
						<div class="well">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input class="form-control" type="text" value="" placeholder="Name" name="name">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
								<input class="form-control" type="text" placeholder="Your Email" name="email">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
								<input class="form-control" type="password" placeholder="New Password" name="password">
							</div>
							<br>
							<div class="radio">
							  <label>
							    <input type="radio" name="accountType" id="optionsRadios1" value="Student" checked>
							    Student
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="accountType" id="optionsRadios2" value="Sponsor">
							    Sponsor
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="accountType" id="optionsRadios3" value="Faculty">
							    Faculty
							  </label>
							</div>
							<br>

							<button type="submit" class="btn btn-default">Login</button>
							<input type="hidden" name="form" value="register"> 
						</div>
					</form>
				</div><!-- col-lg-8 -->
			<div class="col-lg-4">
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

