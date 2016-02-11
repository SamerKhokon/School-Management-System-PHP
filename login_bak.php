

			
                
                  
                <?php
					error_reporting(0);
					if ($_GET['error']==1)
					echo "Please enter valid information";
					
				?>
					<form method="post" action="login_check.php">
						
							<span>Username:</span>
							<input type="text" class="text" maxlength="32" name="user_name" />
							<span>Password:</span>
							<input type="password" class="text" maxlength="32" name="password" />
							<input type="submit" class="button" value="Login" />
							
						
					</form>
				
	
