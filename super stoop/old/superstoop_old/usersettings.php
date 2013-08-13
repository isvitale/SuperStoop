<?php include_once("validate.php"); ?>
<?php $username = $_SESSION['username']?>

<?php
include('db_connect.php');

//personal Information
$query = "SELECT * FROM members WHERE username='$username'";

$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
$row = mysql_fetch_array($result, MYSQL_ASSOC);
mysql_free_result( $result );

	$theEmail = $row['theEmail'];
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
	$bDay = $row["theBday"];
	if($row['theGender']==0){
		$gender = "Male";
	}else{
		$gender = "Female";
	}
	
		//the Address
		$query = "SELECT theAddress, address.zip AS zipcode, theCity, theState ";
		$query .= "FROM address,members,zipcodes ";
		$query .= "WHERE members.username = '$username' AND members.memberID = address.memberID AND address.zip = zipcodes.zip";
		
		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_free_result( $result );
		
		$theAddress = $row['theAddress'];
		$zipcode = $row['zipcode'];
		$theCity = $row['theCity'];
		$theState = $row['theState'];
						
?>	
				

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
			  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
			  <li class="active">Settings</li>
			</ul>

			<div class="row">
                <div class="span12">
                	<h3>Account and Personal Information</h3>
                	<p>Welcome, <?php echo "<b>$username!</b>";?></p>
                	<!--<p>Here, you can view and update your personal account information.</p>-->
					<div class="row">
						<div class="span4">
							<form class="form-horizontal" action="update_personalinfo.php" method="post">												
								<h4>Personal Information</h4>
									<p><b>Name: </b><?php echo $firstName . " " . $lastName ?></p>
									<p><b>Email: </b><?php echo $theEmail; ?></p>
									<p><b>birthday: </b><?php echo $bDay; ?></p>
									<p><b>Gender: </b><?php echo $gender?></p>
								<input class="btn" type="submit" value="Update" />
							</form>																	
						</div><!--span4-->
						<div class="span4">
							<form class="form-horizontal" action="update_addressinfo.php" method="post">												
								<h4>Address Information</h4>
									<p><?php echo $theAddress ?></p>
									<p><?php echo "$theCity, $theState, $zipcode" ?></p>
								<input class="btn" type="submit" value="Update" />
							</form> <!-- .form-horizontal -->
						</div><!--span4-->
					</div><!--row-->
				</div><!--span12-->
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
