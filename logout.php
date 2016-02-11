<?php	session_start();		
		//$user_type = $_SESSION['USER_TYPE'];				
		/*if(isset($user_type) == "user" && $user_type != "parents") 
		{*/
			session_destroy();		
			echo "<script type='text/javascript'>window.location='./';</script>";
		/*}
		else if($user_type == "parents" && $user_type != "user")
		{
			session_destroy();		 
		    echo "<script type='text/javascript'>window.close();</script>";
		}*/
?>
