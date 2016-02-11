<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<title>Login Page</title>	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/login_style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	
		$("#user_name").focus();
		
		$("#user_name").keypress(function(ex){
		   var user_name =  $("#user_name").val();
		    if(ex.which == 13 ) 
		    {
			   if(user_name=="") {
				 alert("Enter username");
				 $("#user_name").focus();
				 return false;
			   }else{
				 $("#password").focus();
			   }
		   }
		});
		$("#password").keypress(function(ex){
		   var password =  $("#password").val();
		   if(ex.which == 13) {
			   if(password=="") {
				 alert("Enter password");
				 $("#password").focus();
				 return false;
			   }else{
				 $("#login_btn").focus();
			   }
		   }
		});		
	    $("#login_btn").click(function(){
		  var username = $("#user_name").val();
		  var password = $("#password").val();
		  var dataStr = "username="+username+"&password="+password;
			if(username=="") 
			{
				 alert("Enter username");
				 $("#user_name").focus();
				 return false;
			}  
			else if(password=="") 
			{
				 alert("Enter password");
				 $("#password").focus();
				 return false;
		    }else{
				$.ajax({
				   type:"post" ,
				   url:"login_check.php" ,
				   data:dataStr , 
				   success:function(st)
				   {				     
						$('#user_name').val('');
						$('#password').val('');		
						if(st==0) {
							alert("Invalid Login Information or Your Password has been date expired or permission off!");
							$('#user_name').focus();
						}else {
							location.href='branches.php';
							//location.href='all_modules.php';						   
						} 
				    }
				});
			}
		});    
	    $("#cancel_btn").click(function(){
		  $("#user_name").val(' ');
		  $("#password").val(' ');
		  $("#user_name").focus();
		});    		
	});
	</script>
</head>

<body>

 	<div style="width: 406px; margin: 160px auto 0;">
		<fieldset>
		
			<legend>Log in</legend>			
			
			<label for="login">User Name</label>
			<input type="text" id="user_name" name="username"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			
			
			<label for="remember_me" style="padding: 0;">Remember me?</label>
			<input type="checkbox" id="remember_me" style="position: relative; top: 3px; margin: 0; " name="remember_me"/>
			<div class="clear"></div>
			
			<br />
			
			<input type="button" id="login_btn" style="margin: -20px 0 0 200px;" class="button" name="commit" value="Log in"/>	
			<input type="reset" id="cancel_btn" style="margin: -29px 0 0 275px;" class="button" name="commit" value="Cancel"/>				
		</fieldset>
	</div>	
	
</body>
</html>