<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="img/SYD.png" id="navbarLogo"></img></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li
			<?php if($this->title == "Home") echo ' class="active"'; ?>
		><a href="index.php">HOME</a></li>
            <li
			<?php if($this->title == "Projects") echo ' class="active"'; ?>
		><a href="projects.php">PROJECTS</a></li>
		<li
			<?php if($this->title == "Submit Proposal") echo ' class="active"'; ?>
		><a href="projectform.php">SUBMIT PROPOSAL</a></li>
            <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
		<li
			<?php if($this->title == "Login" || $this->title == "Account") echo ' class="active"'; ?>
		>
			<?php
				if($GLOBALS['account']->logged) {
					echo "<a href='account.php'>".$GLOBALS['account']->email."</a></li>";
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