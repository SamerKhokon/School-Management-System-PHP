 <?php
error_reporting(0);
include("db.php");
/*

		$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db('system_db') or die('Could not select database');
		
	
	*/	
		
		 $mobileno=$_REQUEST['msisdn'];
		 $sms=$_REQUEST['sms'];
		
		  $sms_parse=explode(" ",$sms);
		  $hotkey=$sms_parse[0];
		  $login_id=$sms_parse[1];		  
		  $login_pass=$sms_parse[2];		  
		  /*
		  $amount=$sms_parse[3];
		  */
 
					$balance="select current_balance as balance from user_account where login_id='$login_id' order by id desc limit 1";
					$result_balance=mysql_query($balance);
					$row_balance=mysql_fetch_array($result_balance);
					$balance=$row_balance['balance'];
					echo "Your donate current balance is $balance";
		

?>		