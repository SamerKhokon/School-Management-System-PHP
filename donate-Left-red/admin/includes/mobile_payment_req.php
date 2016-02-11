<?php

error_reporting(0);
		$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db('system_db') or die('Could not select database');
		
		
		
		
		 $mobileno=$_REQUEST['msisdn'];
		 $sms=$_REQUEST['sms'];
		
		  $sms_parse=explode(" ",$sms);
		  $hotkey=$sms_parse[0];
		  $login_id=$sms_parse[1];
		  $agent_pin=$sms_parse[2];
		  $amount=$sms_parse[3];
		  //$quentity=$sms_parse[4];
		  $payment_agent=$sms_parse[4];		
		 
		 $sel_login_id="select count(*) as chk_login_id from user_info where mobile_no='$mobileno' and login_id='$login_id'";
		 $result_login_id=mysql_query($sel_login_id);
		 $row_login_id=mysql_fetch_array($result_login_id);		 
		 
		 
		 
		 
		 if ($row_login_id['chk_login_id']=1)
		 {
		 $payment_date=date('Ymdhis');
		 $creation_time=date('d/m/Y h:i:s');
		 
		 $chk_pin="select count(*) as count_pin from payment_request where payment_receive_pin='$agent_pin'";
		 $result_chk_pin=mysql_query($chk_pin);
		 $row_chk_pin=mysql_fetch_array($result_chk_pin);
		 if ($row_chk_pin['count_pin']<1)
		 {
		 
		 
		 $ins_pay_req="insert into payment_request (login_id,mobile_no,amount,product_quentity,payment_agent,payment_receive_pin,payment_date,creation_time,pos_id) 
		 values('$login_id','$mobileno','$amount','$quentity','$payment_agent','$agent_pin','$payment_date','$creation_time',(select pos_id from user_info where login_id='$login_id' limit 1))";
		 mysql_query($ins_pay_req);
		 echo "Data successfully entered.your request waiting for Approval.";
		 
		 }
		 else
		 {
		 
		 echo "Duplicate pin number entered";
		 }
		 
		 }
		 
		 else
		 {
		 echo "this pin already entered";	 
		}
		
		 
		
		
		
		?>