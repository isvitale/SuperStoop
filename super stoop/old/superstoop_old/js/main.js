
//jquery - datepicker
$(function() {
	$( "#datepicker" ).datepicker({
		minDate: 0,
		dateFormat: 'mm-dd--yy',
		altField: "#alternate",
		altFormat: "DD, d MM, yy",
		onSelect: function(){
			var day = $("#datepicker").datepicker('getDate').getDate();                 
            var month = $("#datepicker").datepicker('getDate').getMonth() + 1;             
            var year = $("#datepicker").datepicker('getDate').getFullYear();
            var fullDate = year + "-" + month + "-" + day;
			document.getElementById("datepicker").value = fullDate;
		}
	});
});

//Data check for Login and zipcode with JQuery AJAX and PHP
$(document).ready(function() {
	
	//check the user/pswd with the database, this in index.html
	$("#login").click(function() {
	
		var action = $("#form1").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
					$("#form1").slideUp('slow', function() {
						$("#message").html("<p class='success'>You have logged in successfully!</p>");
						window.setInterval(function(){window.location = "index.php"}, 1000);
					});
				else
					$("#message").html("<p class='error'>Invalid username and/or password.</p>");	
			}
		});
		
		return false;
	});
	
	//check zipcode with the database, this is used in index.html
	$("#login2").click(function() {
	
		var action2 = $("#form2").attr('action');
		var form_data2 = {
			zipcode: $("#zipcode").val(),
			is_ajax2: 1
		};
		
		$.ajax({
			type: "POST",
			url: action2,
			data: form_data2,
			success: function(response)
			{
				if(response == 'success')
						window.location = "search.php?zipcode=" + $("#zipcode").val();
				else
					$("#message2").html("<p class='warning'>Invalid US zipcode.</p>");	
			}
		});
		
		return false;
	});
	
});


//Check if username is available when Registering
$(document).ready(function(){
	$("#username").change(function() { 		
		var usr = $("#username").val();
		
		if(usr.length >= 3){
			$("#status").html('<img src="img/loader.gif" align="absmiddle">&nbsp;Checking availability...');
			$.ajax({  
			type: "POST",  
			url: "check.php",  
			data: "username="+ usr,  
			success: 
				function(msg){  		   
					$("#status").ajaxComplete(function(event, request, settings){ 
						if(msg == 'OK'){ //username is available
							$("#username").removeClass('object_error');
							$("#username").addClass("object_ok");										
							$(this).html('&nbsp;<img src="img/accepted.png" align="absmiddle">Available');
							$("#submitButton").attr("disabled", false);
							$("#status").value = "";
							$("#username").value = "";
						}  
						else{  //username is unavailable
							$("#username").removeClass('object_ok');
							$("#username").addClass("object_error");
							$(this).html(msg);		
							$("#submitButton").attr("disabled",true);
							$("#status").value = "";
							$("#username").value = "";
						}  		   
					});//---end ajaxComplete()	
				}//---end sucess: function(msg) 		   
			});//---end $.ajax
		}//---end if
		else{
			$("#status").html('<font color="red">The username should have at least <strong>3</strong> characters.</font>');
			$("#username").removeClass('object_ok'); // if necessary
			$("#username").addClass("object_error");
			$("#status").value = "";
		}//---end else
	});//---end $("#username").change(function()
});//---end $(document).ready(function(){


//Check address with google and if correct retrieve longitude and latitude
$("#zipcode").blur(function() {
	//check address
	var geocoder;
	var address = document.getElementById("address").value;
	var city = document.getElementById("city").value;
	var state = document.getElementById("state").value;
	var zipcode = document.getElementById("zipcode").value;
	var fullAddress = address + " " + city + " " + state + " " + zipcode;

	geocoder = new google.maps.Geocoder();
	geocoder.geocode( { 'address': fullAddress}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
		var latitude = results[0].geometry.location.lat();
		var longitude = results[0].geometry.location.lng();
		document.getElementById("latitude").value = latitude;		
		document.getElementById("longitude").value = longitude;		
	  } else {
		$("#message").html("<p class='warning'>Invalid US address.</p>");	
	  }
	});
});

