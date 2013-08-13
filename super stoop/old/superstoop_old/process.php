<html>
<body>

<?php
/*
**
*This page will receive the info from the form submitted by connect.php
*and add that data to the table.
**
*/
//receive the values
$username = $_POST['username'] ;
$password = $_POST['password'] ;
$firstName = $_POST['firstName'] ;
$lastName = $_POST['lastName'] ;
	$theMonth = $_POST['theMonth'] ;
	$theDay = $_POST['theDay'] ;
	$theYear = $_POST['theYear'] ;
	$theDate = $theYear . "-" . $theMonth . "-" . $theDay;
	$Bday = date('Y-m-d', strtotime($theDate));
$theGender = $_POST['theGender'] ;
$theAddress = $_POST['theAddress'] ;
$theCity = $_POST['theCity'] ;
$theState = $_POST['theState'] ;
$theZip = $_POST['theZip'] ;
$theLatitude = $_POST['latitude'];
$theLongitude = $_POST['longitude'];
$theEmail = $_POST['theEmail'] ;
$active = 1;
$admin = 0;

	
	//connect to the database
	include_once("db_connect.php"); 

	if( !empty($username) && !empty($password) ){
		$query = "INSERT INTO members (username, password, firstName, lastName, theBday, theGender, theEmail, active, admin) VALUES (
				'" . $username . "',
				'" . $password . "',
				'" . $firstName . "',
				'" . $lastName . "',
				'" . $Bday . "',
				'" . $theGender . "',
				'" . $theEmail . "',
				'" . $active . "',
				'" . $admin . "')";
		
		mysql_query($query) or die( "Query failed inserting new member: ". mysql_error() );
		echo "Number of People added to the table: " . mysql_affected_rows() . "</br>";
		$id = mysql_insert_id();
	}

	//retrieve the personID of this person
	if(!empty($theZip)){
		$query = "INSERT INTO address (memberID, zip, latitude, longitude, theAddress) VALUES (
				'" . $id . "',
				'" . $theZip . "',
				'" . $theLatitude . "',
				'" . $theLongitude . "',
				'" . $theAddress . "')";
		
		mysql_query($query) or die( "Query failed inserting the address: ". mysql_error() );
		echo "Number of Addresses added to the table: " . mysql_affected_rows() . "</br>";
	}
	
//close the connection
mysql_close($conn);

	session_start();
	session_destroy();
	session_start();
		
	$_SESSION['username'] = $username; 
    $_SESSION['signed_in'] = true;
	$_SESSION['admin'] == false;
	header("Location:index.php");
	
?>

</body>
</html>
