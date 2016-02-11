


<!-- Content (Right Column) -->
    <div id="content" class="box"> 


     <div class="title" >Withdarw Check details </div> 
	
	 
	     <form method="POST" action="">
		  
		   <div class="form_tab">	
		  
	      <div class="form">
	 
			
			 	  
			  <div class="form_row">
      <label class="left">   Date from: </label>	  
	  
	 
	    <input type="text" name="chk_date_from" id="date_from" value="<?php echo date('Ymd');?>" class="form_input" />
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "date_from",
                          dateFormat: "%Y%m%d",
                          trigger: "date_from",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
	  
	  
	  </div>
			 
			  
			  
			  <div class="form_row">
			 
			  <label class="left"> Login Id: </label>	  
			  
			  <input type="text" id="chk_login_id" class="form_input" name="chk_login_id">			  
			  </div>	  
			  
			  <div class="form_row">
			  <label class="left">Mobile no: </label>	  
			  
			  <input type="text" id="chk_mobile" class="form_input" name="chk_mobile">
			  </div>
			  
		
			  
			  
			  
			  <input type="submit" id="submit" value="submit" name="chk_submit"/>
			  
			</form>
			
			
			</div>
	
   
	  
	  
	  
	  
	  <?php if (isset($_POST['chk_submit'])) {
	  
	  $login_id=$_POST['chk_login_id'];	  
	  $chk_mobile=$_POST['chk_mobile'];
	  $chk_date=$_POST['chk_date_from'];
	  
	  $sel_req_info="select * from withdraw_request where status='New' and login_id='$login_id' and mobile_no='$chk_mobile' and request_date like '$chk_date%' order by id desc limit 1";
	  $result_req_info=mysql_query($sel_req_info);
	  $row_req_info=mysql_fetch_array($result_req_info);
	  
	  ?>
	
	      <div class="title" >Withdarew request Information</div> 
		  
		  <form method="POST" action="">
		  
		   <div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  
	  
	  
	  
	  
  <div class="form_row">
  
     <label class="left"> Request status: </label>	  	  
	  <input type="text" id="req_status" name ="req_status" class="form_input" value="<?php echo $row_req_info['status'];?>" readonly="readonly">
	  
	  </div>
	  
	  
	
	  
	<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" name="login_id" id="login_id" class="form_input" value="<?php echo $row_req_info['login_id'];?>" readonly="readonly">
	  
	  
	  </div>
	  
	  <div class="form_row">
      <label class="left">Mobile no: </label>	  
	  
	  <input type="text" id="mobile" name="mobile" class="form_input" value="<?php echo $row_req_info['mobile_no'];?>" readonly="readonly">
	  </div>
	
	  
	   <div class="form_row">
      <label class="left">Amount: </label>	  
	  
	  <input type="text" id="Amount" name="amount" class="form_input" value="<?php echo $row_req_info['amount'];?>" readonly="readonly">
	  </div>
	  
	  
	    	<div class="form_row">
      <label class="left">   Date : </label>	  
	  
	 
	    <input type="text" id="date_from" name="date_from" value="<?php echo $row_req_info['creation_time'];?>" readonly="readonly" class="form_input" />
       
     
       
        
	  
	  </div>	
	  
	  <div class="form_row">
    
      <label class="left"> Pin NO: </label>	  
	  
	  <input type="text" id="pin_no" name="pin_no" class="form_input">
	  
	  
	  </div>
	 
	   <div class="form_row">
      <label class="left">Agent Name:</label>	  
	  
	  <input type="text" id="agent_pin" class="form_input" name="agent_name">
	  </div>
	  
	   
	   
	  
	
	
<input type="submit" id="submit" value="submit" name="confirm"/>
</form>


	  </div>
	  </div>  
	  
	  <?php } ?>
	  
	  
	  <?php if(isset($_POST['confirm']))
	  {
	  
	   $req_status=$_POST['req_status'];
	  if ($req_status=='New')
	  {
	  $msisdn=$_POST['mobile'];
	  $pin_no=$_POST['pin_no'];
	  $agent_name=$_POST['agent_name'];
	  $req_date=$_POST['date_from'];
	  $login_id=$_POST['login_id'];
	  $amount=$_POST['amount'];
	  
	  $update_stat="update withdraw_request set status='Paid',pin='$pin_no',agent='$agent_name' where login_id='$login_id' and mobile_no='$msisdn' and creation_time='$req_date'";
	  mysql_query($update_stat);
	  
	  $trans_date=date('Ymdhis');
	  //$max_query="select max(current_balance) as max_value from user_account where login_id='$login_id'";
	  $max_query="select current_balance as max_value from user_account where login_id='$login_id' order by id desc limit 1";
	  $result_max=mysql_query($max_query);
	  $row_max=mysql_fetch_array($result_max);
	  $current_balance=$row_max['max_value']-$amount;													
	  $ins_account="insert into user_account(login_id,withdraw_amount,current_balance,sender_id,transection_date) values('$login_id',$amount,'$current_balance','Donate','$trans_date')";
	  mysql_query($ins_account); 
	  
	  
	  
	 	  
	  
	  $sms="Your requested amount has beed paid to $agent_name with pin no $pin_no.";
	  $par=urlencode($sms);	 
	  $inbox_id=date('Ymdhis');
	  $fh="http://123.200.5.67/force_push/?msisdn=$msisdn&msg=$par&in_msg_id=$inbox_id";	  
      $read=fopen($fh,'r');
      echo $responses = fread( $read , 1024);
      fclose($read);
	  
	  
	  }
	  if ($req_status=='paid')
	  {
	  echo "This Data already been paid";
	  }
	  
	  
	  } ?>
	  
      
     
     
    </div>
    <!-- /content -->
	