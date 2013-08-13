<?php
	
	//connect to the database
	include_once("db_connect.php"); 
		
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		//get the posted values
		$username = $_POST['username'];
		$password = $_POST['password'];

		//now validating the username and password
		if( !empty($username) && !empty($password) ){
			$query = "SELECT username,admin ";
			$query .= "FROM members ";
			$query .= "WHERE " . " username = '" . $username . "'";
			$query .= " AND password = '" . $password . "'";

			$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
			$row=mysql_fetch_array($result, MYSQL_ASSOC);
		}	

		// clear out any existing session that may exist
		session_start();
		session_destroy();
		session_start();

		if ( !empty($row) ) {
			$_SESSION['signed_in'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['admin'] = false;			
			if ($row["admin"] == 1 ){
				$_SESSION['admin'] = true;			
			}
			echo "success";
		}
	}		  

	//close the connection
	mysql_close($conn);

?>