<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="en-us" http-equiv="Content-Language">

    <title>tiggin</title>
    
    <script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/settings.js" type="text/javascript"></script>
	<script type="text/javascript">
		pic1 = new Image(16, 16); 
		pic1.src = "loader.gif";
		
		$(document).ready(function(){
			$("#username").change(function() { 		
			var usr = $("#username").val();
			
			if(usr.length >= 3){
				$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
				$.ajax({  
				type: "POST",  
				url: "check.php",  
				data: "username="+ usr,  
				success: 
					function(msg){  		   
						$("#status").ajaxComplete(function(event, request, settings){ 
						
							if(msg == 'OK'){ 
								$("#username").removeClass('object_error'); // if necessary
								$("#username").addClass("object_ok");
								$(this).html('&nbsp;<img src="accepted.png" align="absmiddle"> <font color="Green"> Available </font>  ');
							}  
							else{  
								$("#username").removeClass('object_ok'); // if necessary
								$("#username").addClass("object_error");
								$(this).html(msg);
							}  		   
						});//---end ajaxComplete()	
					}//---end sucess: function(msg) 		   
				});//---end $.ajax
			}//---end if
			else{
				$("#status").html('<font color="red">The username should have at least <strong>3</strong> characters.</font>');
				$("#username").removeClass('object_ok'); // if necessary
				$("#username").addClass("object_error");
				}
			});//---end $("#username").change(function()
		
		});//---end $(document).ready(function(){
		
		//-->
	</script>

<style type="text/css">
body{
font-family:"Trebuchet MS";
font-size:12px;
}
.inn{
		float:left;
		font-size:14px;
		border:solid 1px #000000;
		width:143px;
		font-family:Arial, Helvetica, sans-serif;
		color:#0066CC;
		font-weight:bold;
		
		
		
	}
</style>
	  
  </head>
  
  <body>
 
	
	<table >
	      <tr>
        <td width="35%" align="right" valign="middle" id="abc">User Name  :</td>
        <td width="65%" align="left" valign="middle" ><input id="username"  type="text" name="username" onkeyup="twitter.updateUrl(this.value)" class="inn" />
          &nbsp; http://xyz.com/<span id="username_url"  style="color:#006600; font-weight:bold;">USERNAME</span> </td>
      </tr>
      <tr>
        <td></td>
        <td align="left" valign="bottom" height="20px"><div id="status"></div></td>
      </tr>
         </table>
	  
	
	<script type="text/javascript">
		$( function () {
			twitter.screenNameKeyUp();
			$('#user_screen_name').focus();
		});
	</script>

  </body></html>