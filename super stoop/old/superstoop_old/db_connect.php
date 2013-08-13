<?php

	//variables
	$mysql_host = "localhost";
	$mysql_user = "djeune";
	$mysql_password = "9TtA4j";
	$mysql_db = "djeune";

	// stablish a connection to mySQL
	$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
	// select a database
	mysql_select_db( $mysql_db ) or die( "Could not select database" );

?>