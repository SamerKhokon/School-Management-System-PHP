<?php
    	 include("db.php");				
		 $mobileno=$_REQUEST['msisdn'];
		 $sms=$_REQUEST['sms'];		
		 $sms_parse=explode(" ",$sms);		
		 $hotkey=$sms_parse[0];
		 $login_id=$sms_parse[1];
		 $s_id=$sms_parse[2];		 
		 $name=$sms_parse[3];		
		 $email=$sms_parse[4];			
		 
		$sel_tree="select tree_id from user_info where login_id='$s_id' and status='Active' limit 1";
		$result_tree=mysql_query($sel_tree);
		$row_tree=mysql_fetch_array($result_tree);		
		$tree_id=$row_tree[0];
		 
		 $sel_pin="select count(*) from pin_no where login_id='$login_id' and (status='Available' or status='processing')";
		$result_pin=mysql_query($sel_pin);
		$row_pin=mysql_fetch_array($result_pin);		
		if($row_pin[0]=='1')
		{		
		$sel_form_type="select form_type from form_type where form_type not in (select form_type from user_info where s_id='$s_id' ) limit 1";
		$result_form_type=mysql_query($sel_form_type);
		$row_form_type=mysql_fetch_array($result_form_type);
        $form_type=$row_form_type['form_type'];		
		
         		
							if ($form_type!="")
							{
							
							              $pos_info=select_pos($login_id);
										  $pos_info_parse=explode(",",$pos_info);
										  $pos_mobile=$pos_info_parse[0];										  
										  $pos_id=$pos_info_parse[1];										 
							              $login_secret=generatePassword();
											
											$ins_qury="insert into user_info (s_id,form_type,m_name,mobile_no,email,login_id,login_pass,pos_id,tree_id) values('$s_id','$form_type','$name','$mobileno','$email','$login_id','$login_secret',$pos_id,$tree_id)";
											mysql_query($ins_qury);		 
											
											$ins_qury="insert into user_acl (user_name,password,user_type,main_menu,sub_menu1) values('$login_id','$login_secret','member','1,2','247,253')";
											mysql_query($ins_qury);		 
											
											
											$update_qry="update user_info set status='Active' where login_id=$login_id";
											mysql_query($update_qry);
											 
											$update_qry="update pin_no set status='Used' where login_id=$login_id";
											mysql_query($update_qry);	
											$memberid=$s_id;	
											$qry_level="select * from level_amount order by id";
											$result_level=mysql_query($qry_level);
											$trans_date=date('Ymdhis');
											$id_price=2000/3;
											$company_profit=0;
											while($row_level=mysql_fetch_array($result_level))
											{
											
											$payment=$row_level['amount'];
											$query = "SELECT * FROM user_info where login_id='".$memberid."' and status='Active' order by form_type";											
											$result = mysql_query($query);											
											$row=mysql_fetch_array($result);													
														if ($memberid!="")
														{
														$max_query="select current_balance as max_value from user_account where login_id='$memberid' order by transection_date desc limit 1";
														$result_max=mysql_query($max_query);
														$row_max=mysql_fetch_array($result_max);
														$current_balance=$row_max['max_value']+$payment;														
														$ins_account="insert into user_account(login_id,receive_amount,current_balance,sender_id,transection_date) values('$memberid',$payment,'$current_balance','$login_id','$trans_date')";
														mysql_query($ins_account);
														$id_price=$id_price-$payment;
														}		
											$memberid=$row['s_id'];	
											}	
                                            $ins_account="insert into user_account(login_id,receive_amount,current_balance,sender_id,transection_date) select t.woner_login_id,t.commission,(current_balance+t.commission) as max_value,'$login_id','$trans_date' from tree_info t,user_account ua where t.id=$tree_id and ua.login_id=t.woner_login_id order by ua.transection_date desc limit 1";
											mysql_query($ins_account);
											
											$company_profit=$id_price;		
											$max_query="select current_balance as max_value from company_account  order by transection_date desc limit 1";
											$result_max=mysql_query($max_query);
											$row_max=mysql_fetch_array($result_max);
											$company_current_balance=$row_max['max_value']+$company_profit;
											$ins_account="insert into company_account(sender_id,receive_amount,current_balance,transection_date) values('$login_id',(select ($company_profit-commission) as profit from tree_info where id=$tree_id),'$company_current_balance','$trans_date')";
											mysql_query($ins_account);
														
											echo "You have successfully Registerd with Donate me Program.your password is $login_secret please pay money to $pos_mobile";		  
		 
							}
							else
							{
							echo "Your given mother id has no free hand to add.";		 
							}
						
		}
		else
		{
		echo "Your given login id is not valid.Please enter valid login id";
		}
		
		
		
function select_pos($member_id)
{			//include("db.php");
			$date=date('Ymdhis');			
			$sel_pos="select * from donate_pos where status='Active' and id =(select next_pos_id from member_under_pos order by id desc limit 1)";
			$res_pos=mysql_query($sel_pos);
			$row_pos=mysql_fetch_array($res_pos);
			$pos_mobile=$row_pos['mobile_no'];
			$pos_id=$row_pos['id'];
			$pos_info=$pos_mobile.",".$pos_id;			
			$sel_next_pos="select id from donate_pos where id>$pos_id and status='Active' limit 1";
			$res_next_pos=mysql_query($sel_next_pos);
			$row_next_pos=mysql_fetch_array($res_next_pos);
			$next_pos=$row_next_pos['id'];			
			if ($next_pos!="")
			{			
			$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id,member_id) values($pos_id,'$date',$next_pos,'$member_id')" ;
			mysql_query($insert_pos);			
			}			
			else
			{
			$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id,member_id) values($pos_id,'$date',1,'$member_id')" ;
			mysql_query($insert_pos);
			}
			return $pos_info;
}

		
		function generatePassword ($length = 8)
{
$password = "";
    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }	
    // set up a counter for how many characters are in the password so far
    $i = 0;     
    // add random characters to $password until $length is reached
    while ($i < $length) { 
      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }
    }
    // done!
    return $password;
  }
  ?>

	
	
	