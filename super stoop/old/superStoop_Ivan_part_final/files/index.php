<?php include_once("validate.php"); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SuperStoop</title>
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

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">Super Stoop</a>
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
		
		<div class="carousel-inner">
			<div class="container mainPage">

				<div class="row">
				  <div class="span12">
					<div class="row">
					  <div class="span4">
						<h4>WELCOME</h4>
						<p>
							<?php 
								echo "<b>".  $_SESSION['username'] ."</b> "; 
							 	echo "<b>ADMIN: ".  $_SESSION['admin'] ."</b> "; 
							 	echo "<b>MEMBERID: ".  $_SESSION['memberID'] ."</b> "; 
							 ?>
							 Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
					  </div>
					  <div class="span4 clearfix">
						<h4>FIND YARD SALES</h4>
						<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
						<p>
						  <button class="btn" type="button">Search</button>
						</p>
					  </div>
					  <div class="span4 clearfix">
						<h4>POST A NEW YARD SALE</h4>
						<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
							<p>
							  <button type="button" class="btn btn-success">Post</button>
							</p>
					  </div>
					</div>
				  </div>
				</div>

			</div> <!-- .container -->
		</div><!-- .carouselinner -->
		<footer>
			<p>&copy; SuperStoop 2012</p>
		</footer>

		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
