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
							<li><a href="index.php">Home</a></li>
							<li><a href="mylist.php">My List</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li class="active"><a href="#">F.A.Q.</a></li>
							<li><a href="index.php?logout">Log out</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>

		<div class="container register">
		
			<ul class="breadcrumb">
			  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
			  <li class="active">F.A.Q.</li>
			</ul>

			<div class="row">
                <div class="span12">
					<h2>F.A.Q.</h2>
					<ul>
						<li>How do I find stoop sales?</li>
						<li>How do I post a stoop sale?</li>
						<li>How many stoop sale listings can I have?</li>
						<li>How can I retrieve a lost password?</li>
						<li>I found a problem with the site, what should I do?</li>
						<li>May I post a listing for free?</li>
						<li>How can we contact SuperStoop?</li>
					</ul>
				
					<h4>How do I find stoop sales?</h4>
					<p>Initially, you must have a Superstoop account and from there, you may go to the search page to look up stoop sales by items being sold and/or location.<p>
					
					
					<h4>How do I post a stoop sale?</h4>
					<p>You must have a Superstoop account and just sign in, goto the Post Sale tab and fill out the appropriate fields to inform consumers about your sale.<p>

					<h4>How many stoop sale listings can I have?</h4>
					<p>You are able to have 3 listings up and active simultaneously.<p>

					<h4>How can I retrieve a lost password?</h4>
					<p>Click the "Forgot My Password tab" and answer the security question. Thereafter, your password will be sent to the email address that you used to sign up with SuperStoop<p>

					<h4>I found a problem with the site, what should I do?</h4>
					<p>Send is a detailed message via the Contact Us page (tab in the upper right hand corner)<p>

					<h4>May I post a listing for free?</h4>
					<p>Yes, all listings are free to post.<p>

					<h4>How can we contact SuperStoop?</h4>
					<p>You can do contact Superstoop via email, or call us at 1-800-SUPER4U [(800)787-3748]<p>
				
				</div><!--span12-->
			</div><!--row-->
            <hr>
            <footer>
                <p>&copy; SuperStoop 2012</p>
            </footer>

        </div> <!-- /container -->

    </body>			
</html>
