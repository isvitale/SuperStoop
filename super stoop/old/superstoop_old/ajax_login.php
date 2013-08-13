<?php session_start();

	//connect to the database
	include_once("db_connect.php"); 

	//get the posted values
	$username = $_POST['username'];
	$password = $_POST['password'];

	//now validating the username and password
	if( !empty($username) && !empty($password) ){
		$query = "SELECT username ";
		$query .= "FROM members ";
		$query .= "WHERE " . " username = '" . $username . "'";
		$query .= " AND password = '" . $password . "'";

		$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
		$row=mysql_fetch_array($result);
	}		  

//if username exists
if(mysql_num_rows($result)>0)
{
	//compare the password
	if(strcmp($row['password'],$pass)==0)
	{
		echo "yes";
		//now set the session from here if needed
		$_SESSION['username'] = $username; 
	}
	else
		echo "no"; 
}
else
	echo "no"; //Invalid Login
?>