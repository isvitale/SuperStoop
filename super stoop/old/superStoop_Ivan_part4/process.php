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
		$theGender = $_POST['theGender'] ;
		$theAddress = $_POST['theAddress'] ;
		$theCity = $_POST['theCity'] ;
		$theState = $_POST['theState'] ;
		$theZip = $_POST['theZip'] ;
		$theEmail = $_POST['theEmail'] ;
		$active = 1;
		$admin = 0;
	
		//variables
		$mysql_host = "localhost";
		$mysql_user = "ischmidt";
		$mysql_password = "EFpitg";
		$mysql_db = "ischmidt";
		
		/**********TRY TO CONVERT TO DATE TYPE TO PASS IT TO THE TABLE**************/
		$bday = "$theYear-$theMonth-$theDay";
		//echo "bday = " . $bday . "\n";
		$bday = strtotime($bday)	;
		//echo "strtotime(bday) = " . $bday . "\n";
		$theDate = $theMonth.'/'.$theDay.'/'.$theYear.', 4:57 pm';
		$bday = date('Y-m-d h:i:s', strtotime(str_replace('/', '-', $theDate)));
		//$date = date('Y-m-d h:i:s',$bday );
		//echo "\n theMonth: $theMonth, theDay: $theDay, theYear: $theYear";
		/***************************************************************************/
		
		// stablish a connection to mySQL
		$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
		// select a database
		mysql_select_db( $mysql_db ) or die ( "Could not select database" );
		
		//$query = "SELECT * MEMBERS WHERE username='".$username."';";
		//mysql_query($query) or die ("This username has already been taken, please select a different one!");
		
		if( !empty($username) && !empty($password) ){
			$query = "INSERT INTO members (username, password, firstName, lastName, theBday, theGender, theEmail, active, admin) VALUES (
					'" . $username . "',
					'" . $password . "',
					'" . $firstName . "',
					'" . $lastName . "',
					'" . $date . "',
					'" . $theGender . "',
					'" . $theEmail . "',
					'" . $active . "',
					'" . $admin . "')";
			
			mysql_query($query) or die( "Query failed inserting new member: ". mysql_error() );
			echo "Number of People added to the table: " . mysql_affected_rows() . "</br>";
			$id = mysql_insert_id();
			//PDO::lastInsertId ();
		}
	
		//retrieve the personID of this person
		if(!empty($theZip)){
			$query = "INSERT INTO address (memberID, zip, theAddress) VALUES (
					'" . $id . "',
					'" . $theZip . "',
					'" . $theAddress . "')";
			
			mysql_query($query) or die( "Query failed: ". mysql_error() );
			echo "Number of Addresses added to the table: " . mysql_affected_rows() . "</br>";
		}
	
		//SHOW MEMBERS TABLE
		echo "<h3>Members Table</h3>\n";
		$query = "SELECT * FROM members";
		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
			echo "<table border=\"1\">\n";
			echo "\t<tr>\n";
			echo "\t\t<td>memberID</td>\n";
			echo "\t\t<td>username</td>\n";
			echo "\t\t<td>password</td>\n";
			echo "\t\t<td>firstName</td>\n";
			echo "\t\t<td>lastName</td>\n";
			echo "\t\t<td>theBday</td>\n";
			echo "\t\t<td>theGender</td>\n";
			echo "\t\t<td>theEmail</td>\n";
			echo "\t\t<td>active</td>\n";
			echo "\t\t<td>admin</td>\n";
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
		
		//SHOW ADDRESS TABLE
		echo "<h3>Address Table</h3>\n";
		$query = "SELECT * FROM address";
		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
			echo "<table border=\"1\">\n";
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
