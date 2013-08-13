<?php
	
	//variables
	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "CISC";

	// stablish a connection to mySQL
	$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
	// select a database
	mysql_select_db( $mysql_db ) or die( "Could not select database" );
		
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