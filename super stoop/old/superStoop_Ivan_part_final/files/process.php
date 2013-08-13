<html>
<body>

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
							<li><a href="index.html">Home</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="faq.html">F.A.Q.</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		<?php
		ob_start();
		/*
		**
		*This page will receive the info from the form submitted by connect.php
		*and add that data to the table.
		**
		*/
		//receive the values
		$username = $_POST['username'] ;
		$password = $_POST['password'] ;
		$firstName = $_POST['firstName'] ;
		$lastName = $_POST['lastName'] ;
			$theMonth = $_POST['theMonth'] ;
			$theDay = $_POST['theDay'] ;
			$theYear = $_POST['theYear'] ;
			$theDate = $theYear . "-" . $theMonth . "-" . $theDay;
			$Bday = date('Y-m-d', strtotime($theDate));
		$theGender = $_POST['theGender'] ;
		$theAddress = $_POST['theAddress'] ;
		$theCity = $_POST['theCity'] ;
		$theState = $_POST['theState'] ;
		$theZip = $_POST['theZip'] ;
		$theEmail = $_POST['theEmail'] ;
		$active = 1;
		$admin = 0;
		
			
		include_once("db_connect.php"); 
	
		if( !empty($username) && !empty($password) ){
			$query = "INSERT INTO members (username, password, firstName, lastName, theBday, theGender, theEmail, active, admin) VALUES (
					'" . $username . "',
					'" . $password . "',
					'" . $firstName . "',
					'" . $lastName . "',
					'" . $Bday . "',
					'" . $theGender . "',
					'" . $theEmail . "',
					'" . $active . "',
					'" . $admin . "')";
			
			mysql_query($query) or die( "Query failed inserting new member: ". mysql_error() );
			echo "Number of People added to the table: " . mysql_affected_rows() . "</br>";
			$id = mysql_insert_id();
		}
	
		//retrieve the personID of this person
		if(!empty($theZip)){
			$query = "INSERT INTO address (memberID, zip, theAddress) VALUES (
					'" . $id . "',
					'" . $theZip . "',
					'" . $theAddress . "')";
			
			mysql_query($query) or die( "Query failed inserting the address: ". mysql_error() );
			echo "Number of Addresses added to the table: " . mysql_affected_rows() . "</br>";
		}
			
		mysql_free_result( $result );
		mysql_close($conn);	 
		
		header("location:usersettings.php");
		
		ob_flush();
		?>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>



        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html>