<?php 

 session_start();
 
include_once("db_connect.php");

//if is signed in
if( isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true ){

	$username = $_SESSION['username'];
	
	//query the database for the latitude and longitude
	$query = "SELECT address.zip AS zipC, address.latitude AS latit, address.longitude AS longi, theCity ";
	$query .= "FROM address,members,zipcodes ";
	$query .= "WHERE members.memberID = address.memberID AND username = '$username' AND address.zip = zipcodes.zip";
	
	$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$lat = $row["latit"];
	$lng = $row["longi"];
	$city = $row['theCity'];
	$zipcode = $row['zipC'];
	
	mysql_free_result($result);

//else if comes from a variable passed by the url
}elseif( isset($_GET['zipcode']) && !empty($_GET["zipcode"]) ){

	$zipcode = $_GET["zipcode"];
	
	//query the database for the latitude and longitude
	$query = "SELECT latitude,longitude,theCity ";
	$query .= "FROM zipcodes ";
	$query .= "WHERE " . " zip = '" . $zipcode . "'";

	$result = mysql_query( $query ) or die( "Query failed: ". mysql_error() );
	$row = mysql_fetch_array($result, MYSQL_ASSOC);

	$lat = $row["latitude"];
	$lng = $row["longitude"];
	$city = $row['theCity'];
	
}else{

	$lat = " 40.627946";
	$lng = "-73.94552";
	$city = "Brooklyn";
	$zipcode = "11210";
}
		

	
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SuperStoop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>

	var myCenter=new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);

	function initialize(){
		var mapProp = {
		  center:myCenter,
		  zoom:12,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var map=new google.maps.Map(document.getElementById("map_canvas"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		});

		marker.setMap(map);
	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">Super Stoop</a>
					<div class="nav-collapse collapse pull-right">
						<ul class="nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="faq.html">F.A.Q.</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		<div class="container search">
		
			<ul class="breadcrumb">
			  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
			  <li class="active">Search</li>
			</ul>
					
			<div class="row">
				<div class="span12">
					<div class="row-fluid">
					
					  <div class="span4">
						<div class="searchBox clearfix">
							<h4>FILTER OPTIONS</h4>
																																			
							<form class="form-horizontal" method="post" action="filter.php">
							  <div class="control-group">
								<label class="control-label">Enter City/Zip-code</label>
								<div class="controls">
								  <input class="span11" type="text" name="city" placeholder="City or Zip-code">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Distance</label>
								<div class="controls">
									<select class="span6" name="theMonth">
										<option value="10">10 miles</option>
										<option value="20">20 miles</option>
										<option value="30">30 miles</option>
										<option value="50">50 miles</option>
									</select>
							   </div>
							  </div>							  
							  <input class="btn" type="submit" value="Filter">
							</form>
							
						</div>
					  </div><!--.span4-->
					  
					  <div class="span8 clearfix">
					  
						<h4>Results for: <?php echo $city . " " . $zipcode; ?></h4>
						<div id="map_canvas"></div>	
						
						<div class="nav-collapse collapse">
						  <ul class="nav">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By: <b>Distance</b> <b class="caret"></b></a>
							  <ul class="dropdown-menu">
								<li><a href="#">Distance</a></li>
								<li><a href="#">Date</a></li>
							  </ul>
							</li>
						  </ul>
						</div><!--/.nav-collapse -->						

						<div class="stoopSale">
							<a class="posSearch" href="single.php">1</a>
							<a class="addMyList" href="#">day left</a>
							<dl class="dl-horizontal">
							  <dt>Distance:</dt>
							  <dd>0.4 miles</dd>
							  <dt>Address:</dt>
							  <dd>3657 Broadway</dd>
							  <dt>Date:</dt>
							  <dd>February, 14, 2012</dd>
							</dl>
						</div>
						
						<div class="stoopSale">
							<a class="posSearch" href="single.php">3</a>
							<a class="addMyList" href="#">days left</a>
							<dl class="dl-horizontal">
							  <dt>Distance:</dt>
							  <dd>0.9 miles</dd>
							  <dt>Address:</dt>
							  <dd>3657 Broadway</dd>
							  <dt>Date:</dt>
							  <dd>February, 14, 2012</dd>
							</dl>
						</div>

						<div class="stoopSale">
							<a class="posSearch" href="single.php">4</a>
							<a class="addMyList" href="#">days left</a>
							<dl class="dl-horizontal">
							  <dt>Distance:</dt>
							  <dd>1.2 miles</dd>
							  <dt>Address:</dt>
							  <dd>3657 Broadway</dd>
							  <dt>Date:</dt>
							  <dd>February, 14, 2012</dd>
							</dl>
						</div>
					  </div><!--.span8-->
					  
					</div>
				</div>
			</div>
			
			<footer>
				<p>&copy; Company 2012</p>
			</footer>

		</div> <!-- .container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
