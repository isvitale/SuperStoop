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
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="faq.html">F.A.Q.</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		<div class="container">
		
			<ul class="breadcrumb">
			  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
			  <li class="active">New Stoop Sale</li>
			</ul>
			
			<div class="row">
			  <div class="span12">
				<div class="row">
					<div class="span6">
						<h1>New Stoop Sale</h1>

						<form class="form-horizontal" action="processStoop.php" method="post">
						
							<div class="control-group">
								<label class="control-label">Title:</label>
								<div class="controls">
									<input type="text" class="span4" name="theTitle" placeholder="Title for the Stoop Sale" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Description:</label>
								<div class="controls">
									<textarea name="description"></textarea>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputBirthday">Date:</label>
								<div class="controls">
									<input type="text" class="span2 dateIn" name="theDate" id="datepicker" /><input type="text" id="alternate" size="30" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputBirthday">Time:</label>
								<div class="controls">
									<select class="span1" name="startHour">
										<?php 
											for($i=1;$i<=12;$i++){
												if($i<10){
													echo "<option value=\"0$i\">" . "0". $i . "</option>"  ;
												}else{
													echo "<option value=\"$i\">" . $i . "</option>"  ;
												}
											}
										?>
									 </select>
									<b>:</b>
									<select class="span1" name="startMinute">
										<?php 
											for($i=0;$i<=60;$i++){
												if($i<10){
													if($i==2){echo "<option selected=\"true\" value=\" $i \">" . "0".$i . "</option>"  ;}
													else
													echo "<option value=\"0$i\">" . "0". $i . "</option>"  ;
												}else{
													echo "<option value=\"$i\">" . $i . "</option>"  ;
												}
											}
										?>
									 </select>
									 <select class="span1" name="theTime">
										<option>PM</option>
										<option>AM</option>
									 </select>
									 
								</div>
							</div>
							
							<input class="btn btn-primary" type="submit">
							
						</form>

					</div><!--span6-->
				</div>
			  </div><!--span12-->
			</div>
		</div> <!-- .container -->
		
		<hr>
		
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