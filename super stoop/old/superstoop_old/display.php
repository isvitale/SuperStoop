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
                padding-top: 60px;
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
 
        <div class="container">

			<div class="row">
                <div class="span12">
					<?php
					$mysql_host = "localhost";
					$mysql_user = "root";
					$mysql_password = "";
					$mysql_db = "CISC";
					$table = "members";

					// stablish a connection to mySQL
					$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
					// select a database
					mysql_select_db( $mysql_db ) or die( "Could not select database" );

					echo "<h3>Database Members</h3>\n";

							// set up and execute the MySQL query
							$query = "SELECT * FROM $table";
							$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
							// print the results as an HTML table
							printResults($result);
							// free result
							mysql_free_result( $result );

					//close the connection
					mysql_close($conn);


					function printResults($result){
						echo "<table class=\"table table-striped\">\n";
						echo "\t<tr>\n";
						echo "\t\t<td><b>personID</b></td>\n";
						echo "\t\t<td><b>firstName</b></td>\n";
						echo "\t\t<td><b>lastName</b></td>\n";
						echo "\t\t<td><b>theMonth</b></td>\n";
						echo "\t\t<td><b>theDay</b></td>\n";
						echo "\t\t<td><b>theYear</b></td>\n";
						echo "\t\t<td><b>theGender</b></td>\n";
						echo "\t\t<td id=\"tdEmail\"><b>theEmail</b></td>\n";
						echo "\t</tr>\n";
						while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC )) {
							echo "\t<tr>\n";
							foreach ( $row as $item ) {
								echo "\t\t<td>$item</td>\n";
							}
							echo "\t</tr>\n";
						}
						echo "</table>\n";
					}
					?>
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