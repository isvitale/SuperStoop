<?php

	//connect to the database
	include_once("db_connect.php"); 
	
	$is_ajax = $_REQUEST['is_ajax2'];
	if(isset($is_ajax) && $is_ajax)
	{
		//get the posted zipcode
		$zipcode = $_REQUEST['zipcode'];
				
		//now validating the zipcode with the database
		if( !empty($zipcode) ){
			$query = "SELECT zip ";
			$query .= "FROM zipcodes ";
			$query .= "WHERE " . " zip = '" . $zipcode . "'";

			$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
			$row = mysql_fetch_array($result);
		}
		
		if ( !empty($row) ) {
			echo "success";
		} 	
	}
	
	//close the connection
	mysql_close($conn);
	
?>