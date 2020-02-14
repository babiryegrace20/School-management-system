<nav class="navbar navbar-inverse">
  <div class="container">

	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" id="togglebar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar" href="?page=home.php"><img src="resources/logo.png" id="logo"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	    <ul class="nav navbar-nav">
	        <li><a href="?page=home.php">HOME</a></li>

<?php if(isset($_SESSION['username'])) { ?>

			<li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">STATISTICS<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="?page=success_rate.php">SUCCESS RATE</a></li>
		            <li><a href="?page=failure_rate.php">FAILURE RATE</a></li>
		            <li><a href="?page=average_rate.php">AVERAGE PROCESSING RATE</a></li>
		          </ul>
        	</li> 

	        <li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">JOBS<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="?page=ready_jobs.php">Ready Jobs</a></li>
		            <li><a href="?page=waiting_jobs.php">Waiting Jobs</a></li>
		            <li><a href="?page=with_priority.php">Waiting With Priority</a></li>
		          </ul>
        	</li> 
			
			<li><a href="?page=registered_users.php">REGISTERED USERS</a></li>

<?php } ?>

	</ul> 

<?php if(isset($_SESSION['username'])) { ?>
	<ul class="nav navbar-nav navbar-right">
			 	<!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
		<li id="logout" class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['username']; ?><span class="caret"></span></a>
				    	<ul class="dropdown-menu">
				 			 <li><a href="?page=logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				  		</ul>
		</li>
	</ul>

<?php } else { ?>
	<ul class="nav navbar-nav navbar-right">
			<li><a href="?page=login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul> 

<?php }?>
	</div>

  </div>

</nav>