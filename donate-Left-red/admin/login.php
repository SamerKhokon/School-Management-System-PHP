<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Login Page</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/login_style.css" />
</head>

<body>

	<form id="login-form" action="login_check.php" method="post">
		<!--<div style="width: 406px; margin: 160px auto 0;">-->
        <fieldset>
		
			<legend>Log in</legend>
			<!--
			<label for="login">User Type</label>
			<select name="user_type">
			<option value="member">Member</option>
			<option value="admin">Admin</option>
			</select>
			<div class="clear"></div>
			-->
			
			
			<label for="login">User Name</label>
			<input type="text" id="login" name="user_name"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			
			
			<label for="remember_me" style="padding: 0;">Remember me?</label>
			<input type="checkbox" id="remember_me" style="position: relative; top: 3px; margin: 0; " name="remember_me"/>
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Log in"/>	
		</fieldset>
       <!-- </div>-->
	</form>
	
</body>

</html>