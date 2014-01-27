<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SENI<i class="fa fa-circle"></i>R DESIGN</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.html">HOME</a></li>
            <li><a href="form.html">VIEW PROJECTS</a></li>
            <li><a href="services.html">SUBMIT PROPOSALS</a></li>
            <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
		<li>
			<?php
				if($GLOBALS['account']->getLogged()) {
					echo "<a href='account.php'>".$GLOBALS['account']->getEmail()."</a></li>";
					echo "<li><a href='?logout=yes'>Logout</a></li>";
				}
				else {
					echo "<a href='login.php'>Login</a>";
				}
			?>
		</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>