


<!-- Content (Right Column) -->
     <div id="content" class="box"> 


     <div class="title" >Payment Check details </div> 
	
	 
	     <form method="POST" action="">
		  
    	   <div class="form_tab">	
		  
	       <div class="form">
	 
			
			 
			 
		  	  <div class="form_row">
			
			  <label class="left"> Pin no: </label>	  			  
			  <input type="text" id="chk_pin_no" class="form_input" name="chk_pin_no">
			  </div>
			  
			  <!--
			  
			  <div class="form_row">			 
			  <label class="left"> Login Id: </label>	  			  
			  <input type="text" id="chk_login_id" class="form_input" name="chk_login_id">
			  </div>			 
			  <div class="form_row">
			  <label class="left">Mobile no: </label>	  
			  
			  <input type="text" id="chk_mobile" class="form_input" name="chk_mobile">
			  </div>			  
			  -->
			  
			  
			  <input type="submit" id="submit" value="submit" name="chk_submit"/>
			  
			  </form>
			
			
			 </div>
	
   
	  
	  
	  
	  
	  <?php 
	  if (isset($_POST['chk_submit'])) 
	  {	  
	  $login_id=$_POST['chk_login_id'];	  
	  $chk_mobile=$_POST['chk_mobile'];
	  
	  
	  $chk_pin=$_POST['chk_pin_no'];	  
	  $sel_req_info="select * from payment_request where payment_receive_pin='$chk_pin' limit 1";
	  $result_req_info=mysql_query($sel_req_info);
	  $row_req_info=mysql_fetch_array($result_req_info);
	  
	  ?>
	
	      <div class="title" >Payment request Information</div> 
		  
		  <form method="POST" action="">
		  
		  <div class="form_tab">	
		  
	      <div class="form">
	      <b> 
	  
	  
	  
	  
	  
  <div class="form_row">
  
      <label class="left"> Request status: </label>	  	  
	  <input type="text" id="req_status" name ="req_status" class="form_input" value="<?php echo $row_req_info['status'];?>" readonly="readonly">
	  
	  </div>
	  
	  <div class="form_row">
    
      <label class="left"> Pin NO: </label>	  
	  
	  <input type="text" id="pin_no" name="pin_no" class="form_input" value="<?php echo $row_req_info['payment_receive_pin'];?>" readonly="readonly">
	  
	  
	  </div>
	
	  
	<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" id="login_id" class="form_input" value="<?php echo $row_req_info['login_id'];?>" readonly="readonly">
	  
	  
	  </div>
	  
	  <div class="form_row">
      <label class="left">Mobile no: </label>	  
	  
	  <input type="text" id="mobile" name="mobile" class="form_input" value="<?php echo $row_req_info['mobile_no'];?>" readonly="readonly">
	  </div>
	
	  
	   <div class="form_row">
      <label class="left">Amount: </label>	  
	  
	  <input type="text" name="Amount" id="Amount" class="form_input" value="<?php echo $row_req_info['amount'];?>" readonly="readonly">
	  </div>
	  
	  
	 
	   <div class="form_row">
      <label class="left">Agent Name:</label>	  
	  
	  <input type="text" id="agent_pin" class="form_input" value="<?php echo $row_req_info['payment_agent'];?>" readonly="readonly">
	  </div>
	  
	   
	   
	  
	  	<div class="form_row">
      <label class="left">   Date : </label>	  
	  
	 
	    <input type="text" id="date_from" value="<?php echo $row_req_info['creation_time'];?>" readonly="readonly" class="form_input" />
       
     <input type="text" id="pos_id" name="pos_id" value="<?php echo $row_req_info['pos_id'];?> " readonly="readonly" class="form_input"/>
       
        
	  
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
	  $amount=$_POST['Amount'];
	  $pos_id=$_POST['pos_id'];
	  $update_stat="update payment_request set status='paid' where payment_receive_pin='$pin_no'";
	  mysql_query($update_stat);
	  
	  $date=date('Ymdhis');
	  $ins_col_log="insert into pos_collection_amount (pos_id,collection_amount,login_id,date_time,collection_agent,member_mobileno,agent_pin,payment_req_date)
	                 select pos_id,(amount-(select service_charge from donate_pos where id=$pos_id)),login_id,'$date',payment_agent,mobile_no,payment_receive_pin,payment_date from payment_request where payment_receive_pin='$pin_no'";
	  mysql_query($ins_col_log);			 
	  
	  echo "payment Receive successfully";	  
	  
	  
	  $sel_pin_no ="select * from pin_no where status='Available' order by sno limit 3 ";
	  $rusult_sel_pin=mysql_query($sel_pin_no);
	  $sno_id="";
	  $del_pin="";
	  while($row_sel_pin=mysql_fetch_array($rusult_sel_pin))
	  {
	  $sno_id.=$row_sel_pin['sno'].",";
	  $del_pin.=$row_sel_pin['login_id'].",";
	  }     
	  $sno_id=substr($sno_id,0,-1);
	  $update_pin_stat="update pin_no set status='processing' where sno in($sno_id)";
	  mysql_query($update_pin_stat);	  
	  
	  $sms="The $del_pin pins from now available for you for sale.";
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
	