<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>

<div id="content" class="box">       
	   
		       <div class="title" >Change Password!</div> 
		
 			  <div class="form_tab">
		   <form method="post" action="" >
		   <dl>
	<dt> 
		<label for="firstname">Old Password:</label>
	</dt>
	<dd>
		<input
			name="oldpass"
			
			type="password" />
		<span class="hint">Old Password.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="lastname">New Password:</label>
	</dt>
	<dd>
		<input
			name="newpass"
			
			type="password" />
		<span class="hint">New Password.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="email">Confirm Password:</label>
	</dt>
	<dd>
		<input
			name="conpass"
			
			type="password" />
		<span class="hint">Condfirm Password.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	
	<dd class="button_setting">
		<input
			type="submit"
			class="button2"
			id ="submit"
			value="Submit" />
	</dd>
</dl>


<!--		      <fieldset class="basicc">
		            <legend>Edit Password</legend>	
		        	 <table>
			         <tr height="15"> </tr>  
			         <tr height="25"><td width="15"></td><td>Old Password</td><td>:<input type="password" name="oldpass" /></td></tr>

			         <tr height="25"><td width="15"></td><td>New Password</td><td>:<input type="password" name="newpass" id="newpass" /></td></tr>

			         <tr height="25"><td width="15"></td><td>Conform Password</td><td>:<input type="password" name="conpass" /></td></tr>
                     </table>
			  </fieldset>
			  <input name="submit" type="submit" value="submit" />-->
		 </form>
				
				<?php
						   			
					$oldpas=$_POST["oldpass"];				
				
			        $newpas=$_POST["newpass"];
					$conpas=$_POST["conpass"];
					$result=mysql_query("select login_pass from user_info where login_id='$login_id'"); 
					$row=mysql_fetch_array($result);					 
					$pass=$row['login_pass'];

					if(isset($_POST['submit']))
					  {					 								 				 
					   if($pass==$oldpas)
					     {
					      if($newpas!=$conpas)
						    {
						     echo "invalid password";					  
						    } 			 
					      else		
						     {
						      	$result=("UPDATE user_info SET login_pass='$newpas' where login_id='$login_id'");
								mysql_query($result);			  
						     }					 
					     }
					  else
					       {
					         echo "wrong password";
					 
					       }
					  }
					 
					 mysql_close($oon);
				
				?>
				</div>
				</div>
		  
		