<link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>

<div id="content" class="box">



  <div class="title" >Member Withdraw request </div> 
<div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  <?php
	   $sql_qry="select current_balance from user_account where login_id ='$login_id' order by transection_date desc limit 1";
	  $result=mysql_query($sql_qry);
	  $row=mysql_fetch_array($result);
	  
	  echo "Your current balance is ".$row['current_balance'];
	  ?>
	  <form method="POST" action="" enctype="multipart/form-data">
	  <input type="hidden" id="pos_id" name="pos_id"/>
	  <dl>
	<dt> 
		<label for="firstname">Login Id:</label>
	</dt>
	<dd>
		 <input type="text" class="form_input" id="subname" value="<?php echo $login_id;?>" name="mobile_no" />
		<span class="hint">To Login.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	  <!--<div class="form_row">  
      <label class="left"> Login Id : </label>
	  <input type="text" class="form_input" id="subname" value="<?php echo $login_id;?>" name="mobile_no" />
      </div>-->	 
	  

	<dt> 
		<label for="firstname">Mobile:</label>
	</dt>
	<?php 
$sql_qry="select mobile_no from user_info where login_id='$login_id' limit 1";
$result=mysql_query($sql_qry);
$row=mysql_fetch_array($result);

?>	
	<dd>
		 <input type="text" class="form_input" id="subname" value="<?php echo $row['mobile_no'];?>" name="mobile_no" />
		<span class="hint">Mobile.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  <!--<div class="form_row">  
      <label class="left"> Mobile : </label>
<?php 
//$sql_qry="select mobile_no from user_info where login_id='$login_id' limit 1";
//$result=mysql_query($sql_qry);
//$row=mysql_fetch_array($result);

?>	  
	  <input type="text" class="form_input" id="subname" value="<?php echo $row['mobile_no'];?>" name="mobile_no" />
	  </div>-->
	  
	  <!--<div class="form_row">  
      <label class="left"> Amount : </label> 	
	  <input type="text"  class="form_input" id="subname" name="amount" />
	  </div>
	  
	  
	  
	  <input type="submit" name="submit" id="submit" value="submit"/>-->
	  <dt> 
		<label for="firstname">Amount:</label>
	</dt>
	<dd>
		 <input type="text" class="form_input" id="subname" name="amount" />
		<span class="hint">Amount.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dd class="button_setting">
		<input
			type="submit"
			class="button2"
			id ="submit"
			value="Submit" />
	</dd>
	</dl>
	  </form>
	  </div>
	  </div>
	  







<?php

if (isset($_POST['submit']))
		{
		
		$amount=$_POST['amount'];
	       $mobileno=$_POST['mobile_no'];		
	       if (is_numeric($amount)) 
               { 
               $amount=round($amount);
	       $date=date('Ymd');          
		  
		  
								  
								 $sel_login_id="select count(*) as chk_login_id from user_info where  login_id='$login_id' ";
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
										 
										 
										 $req_chk="select count(*)  as count from withdraw_request where substr(request_date,1,8)='$date' and login_id='$login_id'";
										 
										 $result_req=mysql_query($req_chk);
										 $row_req=mysql_fetch_array($result_req);
										 
										 $row_num=$row_req['count'];
										 
										 
										 if ($current_balance>=$amount and $row_num<1)
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
		
   }		
	?>