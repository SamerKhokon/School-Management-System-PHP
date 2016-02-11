<?php
error_reporting(0);
include("db.php");

		
		  $mobileno=$_REQUEST['msisdn'];
		  $sms=$_REQUEST['sms'];		
		  $sms_parse=explode(" ",$sms);
		  $hotkey=$sms_parse[0];
		  $login_id=$sms_parse[1];		  
		  $login_pass=$sms_parse[2];		  
		  $amount=$sms_parse[3];
		  
		  if (is_numeric ($amount)) 
          { 
          $amount=round($amount);	 
          
		  
		  
								  
								 $sel_login_id="select count(*) as chk_login_id from user_info where mobile_no='$mobileno' and login_id='$login_id' and login_pass='$login_pass'";
								 $result_login_id=mysql_query($sel_login_id);
								 $row_login_id=mysql_fetch_array($result_login_id);		 
								 
								 
								 
								 
								 if ($row_login_id['chk_login_id']=1)
								 {
										 $request_date=date('Ymdhis');
										 $creation_time=date('d/m/Y h:i:s');
										 //$balance="select sum(receive_amount) as receive,sum(withdraw) as withdraw,(sum(receive_amount)-sum(withdraw)) as balance from user_account where login_id='$login_id'";
										 $balance="select current_balance as balance from user_account where login_id='$login_id' order by id desc limit 1";
										 $result_balance=mysql_query($balance);
										 $row_balance=mysql_fetch_array($result_balance);
										 
										 $current_balance=$row_balance['balance'];
										 if ($current_balance>=$amount)
										 {							 
										 
										 $ins_pay_req="insert into withdraw_request (login_id,mobile_no,amount,request_date,creation_time) 
										 values('$login_id','$mobileno','$amount','$request_date','$creation_time')";
										 mysql_query($ins_pay_req);
										 echo "your request is waiting for Approval.";
										 
										 }
										 else
										 {
										 echo "Your requested amount biger then your balance amount. your current available balance is $current_balance";
										 }
										 
								 
								 }
								 else
								 {
								 echo "Your id or password is not valid.Please enter valid ID or password.";
								 }
									 
								
		
		  } 
          else 
          {
		  echo "You have given invalid amount.";
          }
		  
		
		
		
		?>