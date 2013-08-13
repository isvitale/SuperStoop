<?php include_once("validate.php"); ?>
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
		
		<?php
		
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
			$theMonth = $_POST['theMonth'] ;
			$theDay = $_POST['theDay'] ;
			$theYear = $_POST['theYear'] ;
			$theDate = $theYear . "-" . $theMonth . "-" . $theDay;
			$Bday = date('Y-m-d', strtotime($theDate));
		$theGender = $_POST['theGender'];
		$theEmail = $_POST['theEmail'] ;
		
		$theAddress = $_POST['theAddress'] ;
		$theCity = $_POST['theCity'] ;
		$theState = $_POST['theState'] ;
		$theZip = $_POST['theZip'] ;

		$active = 1;
		$admin = 0;
	
		//variables
		$mysql_host = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$mysql_db = "CISC";
		
		include_once("db_connect.php"); 
		
		if(!empty($oldPassword) && !empty($newPassword)){ 
			$query = "SELECT password FROM members WHERE password='".$oldpassword."'";
			mysql_query($query) or die ("Incorrect password!");
			
			if($query){
				$query = "UPDATE members SET password='".$newPassword."' WHERE username='".$_SESSION['username']."'";			
				mysql_query($query) or die ("Query failed: ".mysql_error());
				if($query){
					echo "\nYour password has been updated!";
				}
			}
			echo "<p>Old password: ".$oldPassword."</p>";
			echo "<p>New password: ".$newPassword."</p>";	
		}

		if(!empty($firstName)){
			$query = "UPDATE members SET firstName='".$firstName."' WHERE username='".$_SESSION['username']."'";
			mysql_query($query) or die("Query failed: ".mysql_error());
			if($query){
					echo "\n\nYour first name has been updated to ".$firstName;
			}
		}
		
		if(!empty($lastName)){
			$query = "UPDATE members SET lastName='".$lastName."' WHERE username='".$_SESSION['username']."'";
			mysql_query($query) or die("Query failed: ".mysql_error());
			if($query){
					echo "\n\nYour last name has been updated to ".$lastName;
			}
		}
		
		if(!empty($theEmail)){
			$query = "UPDATE members SET theEmail='".$theEmail."' WHERE username='".$_SESSION['username']."'";
			mysql_query($query) or die("Query failed: ".mysql_error());
			if($query){
					echo "\n\nYour email address has been updated to ".$theEmail;
			}
		}
		
		
		if(!empty($theYear) || !empty($theMonth) || !empty($theDay)){
			echo $theYear."-".$theMonth."-".$theDay;
			$query = "UPDATE members SET theBday='".$theYear."-".$theMonth."-".$theDay."' WHERE username='".$_SESSION['username']."'";
			mysql_query($query) or die("Query failed: ".mysql_error());
			if($query){
					echo "\n\nYour birthday has been updated to ".$theYear."-".$theMonth."-".$theDay;
			}
		}
		
				
		if(!empty($theAddress)){
			$query = "UPDATE address INNER JOIN members ON members.memberID = address.memberID SET theAddress='".$theAddress."' WHERE members.username='".$_SESSION['username']."'";
			mysql_query($query) or die("Query failed: ".mysql_error());
			if($query){
					echo "\n\nYour address has been updated to ".$theAddress;
			}
		}
		
		//close the connection
		mysql_close($conn);		
		
		if($_SESSION['admin']){
			header("location:adminsettings.php");	
		}else{
			header("location:usersettings.php");
		}
		?>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>



        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html>
