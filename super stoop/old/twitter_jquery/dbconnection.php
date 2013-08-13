<?php
	$mysql_hostname = "localhost";
	$mysql_user = "ischmidt";
	$mysql_password = "EFpitg";
	$mysql_database = "ischmidt";
	$bd = mysql_connect($'localhost', $'ischmidt', $'EFpitg') or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>