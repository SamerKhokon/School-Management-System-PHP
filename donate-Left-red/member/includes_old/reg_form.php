<link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>
<!---New Css -->
 


<div id="content" class="box">


<?php

if (isset($_POST['submit']))
		{		
		 $mobileno=$_REQUEST['msisdn'];
		 $login_id=$_REQUEST['login_id'];
		 $s_id=$_REQUEST['mother_id'];		 
		 $name=$_REQUEST['name'];		
		 $email=$_REQUEST['email'];		
		 $address=$_REQUEST['address'];
	  	 
		//////////////For Picture////////////////////
		 $file_type=$_FILES["file"]["type"] ;
		 $file_error=$_FILES["file"]["error"];
		 $file_size=$_FILES["file"]["size"];
		 $file_name=$_FILES["file"]["name"];
		 $file_temp_name=$_FILES["file"]["tmp_name"];
		/////////////////////////////////////////////
		 

		
		
		 
		 
		 
		 
	   
		 
		 
		 
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
							
							                         /* Pos commision for paymrnt collection
							                          $pos_info=select_pos($login_id);
										  $pos_info_parse=explode(",",$pos_info);
										  $pos_mobile=$pos_info_parse[0];										  
										  $pos_id=$pos_info_parse[1];
										*/  
										  
							              $login_secret=generatePassword();
											
											$pic_upload=picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name);
		
											 $ins_qury="insert into user_info (s_id,form_type,m_name,mobile_no,email,address,mailing_address,login_id,login_pass,pos_id,tree_id,picture,status) values('$s_id','$form_type','$name','$mobileno','$email','$address','$address','$login_id','$login_secret',$pos_id,$tree_id,'$pic_upload','Active')";
											mysql_query($ins_qury);		 
											
											//$ins_qury="insert into user_acl (user_name,password,user_type,user_group_id) values('$login_id','$login_secret','member','1')";
											//mysql_query($ins_qury);		 
											
											
											//$update_qry="update user_info set status='Active' where login_id=$login_id";
											//mysql_query($update_qry);
											 
											$update_qry="update pin_no set status='Used' where login_id=$login_id";
											mysql_query($update_qry);	
											$memberid=$s_id;	
											$qry_level="select * from level_amount order by id";
											$result_level=mysql_query($qry_level);
											$trans_date=date('Ymdhis');
											
											$sql_price="select product_price/3 as price from product_list where id=1";
											$result_price=mysql_query($sql_price);
											$row_price=mysql_fetch_array($result_price);
											$id_price=$row_price['price'];
											
											
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
														
														
														
														if($payment>0)
														{
														$ins_account="insert into user_account(login_id,receive_amount,current_balance,sender_id,transection_date) values('$memberid',$payment,'$current_balance','$login_id','$trans_date')";
														mysql_query($ins_account);
														
														}
														$id_price=$id_price-$payment;
														}		
											$memberid=$row['s_id'];	
											}	
											////////tree woner commision//// 
                                                                                        //$ins_account="insert into user_account(login_id,receive_amount,current_balance,sender_id,transection_date) select t.woner_login_id,t.commission,(current_balance+t.commission) as max_value,'$login_id','$trans_date' from tree_info t,user_account ua where t.id=$tree_id and ua.login_id=t.woner_login_id order by ua.transection_date desc limit 1";
											//mysql_query($ins_account);
											
											
											
											$pos_comission=pos_commision($pos_id,$login_id);
											$company_profit=$id_price-$pos_comission;		
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
		

		
		
		}
else
{


?>




  <div class="title" >Short Registration </div> 
  <div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  <form method="POST" action="" enctype="multipart/form-data">
	  <input type="hidden" id="pos_id" name="pos_id"/>
	  
	<dl>
	<dt> 
		<label for="firstname">Name:</label>
	</dt>
	<dd>
		<input
			name="name"
			id="subname"
			type="text" />
		<span class="hint">This is the name your mama called you when you were little.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="lastname">Registration Id:</label>
	</dt>
	<dd>
		<input
			name="login_id"
			id="subname"
			type="text" />
		<span class="hint">This is the Registration Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="email">Uplink Id:</label>
	</dt>
	<dd>
		<input
			name="mother_id"
			id="subname"
			type="text" />
		<span class="hint">This is the Uplink Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="email">Address:</label>
	</dt>
	<dd>
		<input
			name="address"
			id="subname"
			type="text" />
		<span class="hint">Address.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	<dt>
		<label for="username">Mobile NO:</label>
	</dt>
	<dd>
		<input
			name="mobile_no"
			id="subname"
			type="text" />
		<span class="hint">Mobile No.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="password">Email:</label>
	</dt>
	<dd>
		<input
			name="email"
			id="subname"
			type="text" />
		<span class="hint">E-mail address.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="password">Picture:</label>
	</dt>
	<dd>
		<input
			name="file"
			id="subname"
			type="file" />
		<span class="hint">Picture Upload.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	<dd >
		<input
			type="submit"
			class="button_sub"
			id ="submit"
			value="Submit" />
	</dd>
</dl>
	  
	   <!--<div class="form_row">  
      <label class="left"> Name : </label>  	  	  
	  <input type="text" class="form_input" id="subname" name="name" />
	  	
	  </div>
	  
	   <div class="form_row">  
      <label class="left"> Registration Id : </label>  	  	  
	  
	  <input type="text" class="form_input" id="subname" name="login_id" />
	  </div>
	  
	  <div class="form_row">  
      <label class="left"> Uplink Id : </label> 	  
	  <input type="text"  class="form_input" id="subname" name="mother_id" />
	  </div>
	  
	  <div class="form_row">  
      <label class="left"> Address : </label> 	
	  <input type="text"  class="form_input" id="subname" name="address" />
	  </div>
	  <div class="form_row">  
      <label class="left"> Mobile NO : </label> 	
	  <input type="text" class="form_input" id="subname" name="mobile_no" />
	  </div>
	  <div class="form_row">  
      <label class="left"> Email : </label> 	
	  <input type="text" class="form_input" id="subname" name="email" />
	  </div>
	  
	  <div class="form_row">  
      <label class="left"> Picture : </label> 	
	  <input type="file" class="form_input" id="subname" name="file" />
	  </div>
	  <input type="submit" name="submit" id="submit" value="submit"/>-->
	  </form>
	  </div>
	  </div>

<?php
}
		
?>

</div>







<?php
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




function picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name)
{
        if ((($file_type == "image/gif")
           || ($file_type == "image/jpeg")
           || ($file_type == "image/pjpeg"))
           && ($file_size < 1000000))
  {
  if ($file_error > 0)
    {
    $rtr= "Return Code: " . $file_error . "<br />";
    }
  else
    {
	
    
    if (file_exists("upload/" . $file_name))
      {
      $rtr=$file_name . " already exists. ";
      }
    else
      {
      move_uploaded_file($file_temp_name,
      "upload/" . $file_name);
  
	  $image_name = "upload/" . $file_name;

      //$rtr= "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" />";
	  $rtr="$image_folder/$image_name";

      }
    }
  }
  else
  {
  $rtr= "Invalid file";
  }
  
  return $rtr;
  
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
  
  
  
  
  function pos_commision($pos_id,$reg_id)
  {
  
  $trans_date=date('Ymdhis');
  $pos_charge="select service_charge from donate_pos where id=$pos_id";
  $result_charge=mysql_query($pos_charge);
  $row_charge=mysql_fetch_array($result_charge);
  $payment=$row_charge['service_charge'];
  $current_balance=0;
  if ($payment>0)
  {
	
	 $max_query="select current_balance as max_value from pos_account where pos_id=$pos_id order by transection_date desc limit 1";
	$result_max=mysql_query($max_query);
	$row_max=mysql_fetch_array($result_max);
	$current_balance=$row_max['max_value']+$payment;
	
	$ins_account="insert into pos_account(pos_id,receive_amount,current_balance,sender_id,transection_date) values('$pos_id',$payment,'$current_balance','$reg_id','$trans_date')";
        mysql_query($ins_account);
	
  }
  return $payment;
}
  ?>

	
	
	
