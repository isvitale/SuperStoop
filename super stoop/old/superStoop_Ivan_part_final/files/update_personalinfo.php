<?php include_once("validate.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
 
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.html">Super Stoop</a>
					<div class="nav-collapse collapse pull-right">
						<ul class="nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="mylist.php">My List</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="faq.php">F.A.Q.</a></li>
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="usersettings.php">Settings</a></li>
									 <?php
									 if($_SESSION['admin'] == true){
										echo "<li><a href='adminpanel.php'>Admin Panel</a></li>";
									 }?>
                                    <li><a href="index.php?logout">Logout</a></li>
                                </ul>
                            </li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
 
		<div class="container register">
		
			<ul class="breadcrumb">
			  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
			  <li class="active">Register</li>
			</ul>
				
		<div class="row">		
			<!--UPDATE PASSWORD-->
			<form class="form-horizontal" action="updateuser.php?oldPassword&newPassword" method="post">												
				<div class="firstBox span4">
					<h4>Change Password</h4>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" class="span2" name="oldPassword" placeholder="Confirm password" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" class="span2" name="newPassword" placeholder="New password" />
						</div>
					</div>
					<input type="submit" value="Update" />
				</div><!--span4-->							
				</form>
			<!--UPDATE PERSONAL INFO-->
			<form class="form-horizontal" action="updateuser.php?firstName&lastName&theEmail&theMonth&theDay&theYear" method="post">												
				<div class="span4 secondBox">
					<h4>Change Personal Information</h4>
					<div class="control-group">
						<label class="control-label">First Name</label>
						<div class="controls">
						  <input type="text" class="span2" name="firstName" placeholder="Your First Name">
						</div>
					</div>
						
					<div class="control-group">
						<label class="control-label">Last Name</label>
						<div class="controls">
						  <input type="text" class="span2" name="lastName" placeholder="Your Last Name">
						</div>
					</div>
						
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
						  <input type="text" class="span3" name="theEmail" placeholder="Your Email">
						</div>
					</div>
						
					<div class="control-group">
						<label class="control-label">Birthday</label>
						<div class="controls">
						
						  <select class="bday" name="theMonth">
							<option value="0">Month:</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						  </select>
						  
						  <select class="bday" name="theDay">
							<option value="0">Day:</option>
							<?php 
								for($i=1;$i<=31;$i++){ 
									echo "<option value=\" $i \">" . $i . "</option>"  ;
								}
							?>
						  </select>
						  
						  <select class="bday" name="theYear">
							<option value="0">Year:</option>
							<?php
								$currentYear = date("Y")-1;
								$startsAt = date("Y") - 107;
								for($i=$currentYear; $i>$startsAt; $i--){ 
									echo "<option value=\"" . ($i+1) . "\">" . ($i+1) . "</option>"  ;
								}
							?>
						  </select>
						  
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Gender</label>
						<div class="controls">
						  <label class="radio inline">
							<input type="radio" name="theGender" value="1" checked>
							  Female
						  </label>
						  <label class="radio inline">
							<input type="radio" name="theGender" value="0">
							  Male
						  </label>
						</div>
					</div>		
					<input type="submit" value="Save" />
				</div><!--span4-->
			</form>
		</div><!--row-->
		</div>
		<hr>

            <footer>
                <p>&copy; SuperStoop 2012</p>
            </footer>

        </div> <!-- /container -->    
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html>
