<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  	//variables
	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "CISC";

	// stablish a connection to mySQL
	$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('Could not connect: '.mysql_error());
	// select a database
	mysql_select_db( $mysql_db ) or die( "Could not select database" );
	
	if( !empty($username) && !empty($password) ){
		$query = "SELECT username ";
		$query .= "FROM members ";
		$query .= "WHERE " . " username = '" . $username . "'";
		$query .= " AND password = '" . $password . "'";

		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
		//$row = mysql_fetch_row( $result, MYSQL_ASSOC );
		$num_rows = mysql_num_rows($result);
	}		  

	
  // clear out any existing session that may exist
  session_start();
  session_destroy();
  session_start();

  //if ($row) {
  if ( $num_rows == 1 ) {
    $_SESSION['signed_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: ./index2.php");
  } else {
    $_SESSION['flash_error'] = "Invalid username or password";
    $_SESSION['signed_in'] = false;
    $_SESSION['username'] = null;
    header("Location: ./index.php");
  }
?>