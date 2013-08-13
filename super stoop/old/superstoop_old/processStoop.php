<html>
<head>
</head>
<body>
<?php

	session_start();

/*
**
*This page will receive the info from the form submitted by connect.php
*and add that data to the table.
**
*/
//receive the values
$username = $_SESSION['username'];
$theTitle = $_POST['theTitle'];
$description = $_POST['description'];
	
$theDate = $_POST['theDate'];
$stoopDate = date('Y-m-d', strtotime($theDate));

	$startHour = $_POST['startHour'];
	$startMinute = $_POST['startMinute'];
	$theTime = $_POST['theTime'];	
	if($theTime == "PM")
		$fullTime = ($startHour+12) . ":" . $startMinute . ":00";
	else
		$fullTime = $startHour . ":" . $startMinute . ":00";
	$fromTime = date('H:i', strtotime($fullTime));

	//connect to the database
	include_once("db_connect.php");
	
	//get the 'memberID' and 'addressID' from the 'address' table using the 'username'
	$query = "SELECT address.memberID AS member, addressID ";
	$query .= "FROM address,members ";
	$query .= "WHERE members.memberID = address.memberID AND username = '$username'";
	
	$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$memberID = $row['member'];
	$addressID = $row['addressID'];

	if( !empty($username) && !empty($memberID) && !empty($addressID) ){
		$query = "INSERT INTO stoopsales (memberID, addressID, theTitle, theDate, description, fromTime) VALUES (
				'" . $memberID . "',
				'" . $addressID . "',
				'" . $theTitle . "',
				'" . $stoopDate . "',
				'" . $description . "',
				'" . $fromTime . "')";
		
		mysql_query($query) or die( "Query failed inserting new member: ". mysql_error() );
	}
	
//close the connection
mysql_close($conn);

header("Location:index.php");
	
?>

</body>
</html>
