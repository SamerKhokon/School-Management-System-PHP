 <link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" /> 

<div id="content" class="box">





<fieldset class="login">
<legend>Member Registration Form</legend>



 
 <form enctype="multipart/form-data" action="" method="POST">
 
 <table border="0" cellpadding="0"  cellspacing="0"  id="id-form">

 
 <tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" id="subname" name="name" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		
		
		<tr>
			<th valign="top">Registration ID:</th>
			<td><input type="text" class="inp-form" id="subname" name="login_id" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		


		<tr>
			<th valign="top">Mother Id:</th>
			<td><input type="text" class="inp-form" id="subname" name="mothr_id" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		
		
			<tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-textarea" id="subname" name="address" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		
		<tr>
			<th valign="top">Mobile No:</th>
			<td><input type="text" class="inp-form" id="subname" name="mobile_no" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		
		<tr>
			<th valign="top">E-mail:</th>
			<td><input type="text" class="inp-form" id="subname" name="email" /></td>
	
            <td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
 
 <tr>
			<th valign="top">Picture Upload:</th>
		
 <td> <input name="uploaded" type="file" /></td>
 
 
			</tr>
			
			
			
			<tr>
			<th>&nbsp;</th>
		<td valign="top">
		
 <input type="submit" value="Upload" name="submit" class="form-submit"/>
 			<input type="submit" value="" name="reset" class="form-reset"  />

 </td>
 </tr>

	
 
 </table>
 
 </form> 
 
</fieldset> 
  <?php 
  if(isset($_POST['submit']))
  {
  
         $mobileno=$_REQUEST['msisdn'];
		 $login_id=$_REQUEST['login_id'];
		 $s_id=$_REQUEST['mother_id'];		 
		 $name=$_REQUEST['name'];		
		 $email=$_REQUEST['email'];		
		 $address=$_REQUEST['address'];
 

			
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
							
							
											/////////Upload picture////////////////////
											 $target = "upload/"; 
											 //$target = $target . basename( $_FILES['uploaded']['name']) ; 
											 $target = $target .$login_id;//basename($login_id) ; 
											 $ok=1; 
											 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
											 {
											 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
											 //////////////////////////////////////////////////////////////////////////
											 //echo '<img src="upload/"'.$login_id.'" width="150" height="150" />';
											 }
											 //////////////////////////////////////////////////////////////////////////
											  
											 else {
											 echo "Sorry, there was a problem uploading your file.";
											 }
								            ////////////////////////////////////////////////////
															
							              $pos_info=select_pos($login_id);
										  $pos_info_parse=explode(",",$pos_info);
										  $pos_mobile=$pos_info_parse[0];										  
										  $pos_id=$pos_info_parse[1];										 
							              $login_secret=generatePassword();
											
											$ins_qury="insert into user_info (s_id,form_type,m_name,mobile_no,email,address,mailing_address,login_id,login_pass,pos_id,tree_id) values('$s_id','$form_type','$name','$mobileno','$email','$address','$address','$login_id','$login_secret',$pos_id,$tree_id)";
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
		
 
			 
			 
			 
 }
 ?> 