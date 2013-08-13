<?php
	
	if(isSet($_POST['username'])){
		$username = $_POST['username'];	
		include("dbconnection.php");
		$sql_check = mysql_query("SELECT username FROM members WHERE username='$username';");	
		if(mysql_num_rows($sql_check)){
			echo '<font color="red">The username '.$username.' is already in use.</font>';
		}
		else{
			echo 'OK';
		}
	}
?>