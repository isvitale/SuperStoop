<?php

	// This is a sample code in case you wish to check the username from a mysql db table
	
	if(isSet($_POST['username'])){
		$username = $_POST['username'];
		
		//connect to the database
		include_once("db_connect.php"); 
		
		$sql_check = mysql_query("SELECT username FROM members WHERE username='$username'");	
		if(mysql_num_rows($sql_check)){
			echo '<font color="red">The username <STRONG>'.$username.'</STRONG> is already in use.</font>';
		}
		else{
			echo 'OK';
		}
	}

?>