<?php


		$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db('system_db') or die('Could not select database');
		
		
		
		
		 $mobileno=$_REQUEST['msisdn'];
		 $sms=$_REQUEST['sms'];
		 
		 
		 $words=explode(" ",$sms);
		 $hotkey= $words[0];
		 
		 $login_id=$words[1];
		 
		 for ($i = 2; $i < count($words); $i++)
			{
			$address.=" ".$words[$i];
			}

		   $update_add="update user_info set address='$address',mailing_address='$address' where  login_id='$login_id' and mobile_no='$mobileno'";
		 mysql_query($update_add) or die("Your given information is not valid");
		 
		 echo "Your Address has been updated successfully";
		 
		
		
		 
		 ?>