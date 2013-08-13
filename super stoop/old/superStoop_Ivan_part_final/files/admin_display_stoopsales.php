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
	
		//variables
		$mysql_host = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$mysql_db = "CISC";
		
		// stablish a connection to mySQL
		$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
		mysql_select_db( $mysql_db ) or die ( "Could not select database" );
	
		//SHOW MEMBERS TABLE
		echo "<h3>Stoopsales</h3>\n";
		$query = "SELECT stoopSaleID, memberID, addressID, theTitle, theDate, fromTime FROM stoopsales";
		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
			
			echo "<table border=\"1\">\n";
			echo "\t<tr>\n";
			
			echo "\t\t<td>Stoop Sale ID#</td>\n";
			echo "\t\t<td>Member ID#</td>\n";
			echo "\t\t<td>Address ID#</td>\n";
			echo "\t\t<td>Title</td>\n";
			echo "\t\t<td>Date</td>\n";
			echo "\t\t<td>From Time</td>\n";
			
			echo "\t</tr>\n";
			while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC )) {
				echo "\t<tr>\n";
				foreach ( $row as $item ) {
					echo "\t\t<td>$item</td>\n";
				}
				echo "\t</tr>\n";
			}
			
			echo "</table>\n";

		mysql_free_result( $result );
		
		//close the connection
		mysql_close($conn);		
		?>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>



        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html>
