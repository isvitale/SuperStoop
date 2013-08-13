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
							<li class="active"><a href="#">My List</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="faq.php">F.A.Q.</a></li>
							<li><a href="index.php?logout">Log out</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		<div class="container">
			
			<ul class="breadcrumb">
			  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
			  <li class="active">My List</li>
			</ul>


			<div class="row">
				<div class="span12">
					<h3>My List of Stoop Sales</h3>
					<div class="row-fluid">
					
						<div class="span5">
							<iframe width="470" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?t=m&amp;msa=0&amp;msid=204853740400612681078.0004d021c1fba3a1449cb&amp;source=embed&amp;ie=UTF8&amp;ll=40.628513,-73.952022&amp;spn=0.0114,0.018239&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?t=m&amp;msa=0&amp;msid=204853740400612681078.0004d021c1fba3a1449cb&amp;source=embed&amp;ie=UTF8&amp;ll=40.628513,-73.952022&amp;spn=0.0114,0.018239&amp;z=15" style="color:#0000FF;text-align:left">My List</a> in a larger map</small> 
						</div><!--.span4-->
						
						<div class="span7">
						
						
							<div class="stoopSale">
								<a class="posSearch" href="single.php">1</a>
								<a class="addMyList" href="#">day left</a>
								<h4>BC Stoop Sale</h4>
								<dl class="dl-horizontal">
								  <dt>Distance:</dt>
								  <dd>0.4 miles</dd>
								  <dt>Address:</dt>
								  <dd>3657 Broadway</dd>
								  <dt>Date:</dt>
								  <dd>February, 14, 2012</dd>
								  <dt>Description:</dt>
								  <dd>Books and College Apparel for sale!</dd>
								</dl>
							</div>
							
							<div class="stoopSale">
								<a class="posSearch" href="single.php">3</a>
								<a class="addMyList" href="#">days left</a>
								<h4>Antique Sale</h4>
								<dl class="dl-horizontal">
								  <dt>Distance:</dt>
								  <dd>0.9 miles</dd>
								  <dt>Address:</dt>
								  <dd>3657 Broadway</dd>
								  <dt>Date:</dt>
								  <dd>February, 14, 2012</dd>
								  <dt>Description:</dt>
								  <dd>Old Furniture, Paintings and Books will be sold. Great prices; willing to negotiate.</dd>
								</dl>
							</div>

							<div class="stoopSale">
								<a class="posSearch" href="single.php">4</a>
								<a class="addMyList" href="#">days left</a>
								<h4>Clothes-2-Go</h4>
								<dl class="dl-horizontal">
								  <dt>Distance:</dt>
								  <dd>1.2 miles</dd>
								  <dt>Address:</dt>
								  <dd>3657 Broadway</dd>
								  <dt>Date:</dt>
								  <dd>February, 14, 2012</dd>
								  <dt>Description:</dt>
								  <dd>Clothing Sale! All clothes are in great condition and some are even brand new!!! Reasonable prices!!!</dd>
								</dl>
							</div>
						</div><!--.span8-->
			
					</div>
				</div><!--.span12-->
			</div>
					
		</div><!--.container-->
		
		<hr>
		
		<footer>
			<p>&copy; SuperStoop 2012</p>
		</footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
 
	</body>
</html>
