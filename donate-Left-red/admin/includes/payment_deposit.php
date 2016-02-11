 

<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  
	
	      <div class="title" >Payment deposit Information</div> 
		  <div class="form_tab">	
		<form method="POST" action="">   
	  <div class="form">
	  
	  <div class="form_row">
      <label class="left"> Donate Pos Id: </label>	  	  
	  <input type="text" id="pos_id"  class="form_input" value ="<?php echo $pos_id;?>" readonly="readonly">	  	  
	  </div>	  
	  
	  
	  
	  
	  
	  <div class="form_row">
      <label class="left">Depost Type: </label>	  	  
	  <select  id="deposit_type" name="deposit_type" class="form_input">
  	  <option value="collection">Collection payment</option>
	  <option value="pinrequest">Pin request</option>
	  </select>	  
	  </div>	  
	  
	 

      <div class="form_row">
      <label class="left">Bank Name: </label>	  	  
	  <select  id="bank_name" name="bank_name" class="form_input">
	  <?php 
	  $sel_bank="select * from bank_info";
	  $res_bank=mysql_query($sel_bank);
	  while ($row_bank=mysql_fetch_array($res_bank))
	  {
	  echo "<option value=\"$row_bank[0]\">$row_bank[1]</option>";
	  }
	  
	  ?>
	  </select>Bank Information
	  </div>
	  
	  
	 
	 
	  <div class="form_row">
      <label class="left">Account Number: </label>	  	  
	  <input type="text" id="account_number" name ="account_number" class="form_input">
	  </div>	 
	 
      
	
    

	
	  
	  <div class="form_row">
      <label class="left">Amount: </label>	  	  
	  <input type="text" id="Amount" name="amount" class="form_input">
	  </div>
	  
	  
	 
	  <div class="form_row">
      <label class="left">Agent&nbsp;pin:</label>	  	  
	  <input type="text" id="agent_pin" class="form_input">
	  </div>  
	   
	   
	
	  
	
<input type="submit" id="submit" name="submit" value="submit"/>
	  </div>
	  </form>
	  </div>
      
     
	 
	 <?php
	 
	 if (isset($_POST['submit']))
	 {
	 
	 $amount=$_POST['amount'];
	 $bank_name=$_POST['bank_name'];
	 $account_number=$_POST['account_number'];
	 $deposit_type=$_POST['deposit_type'];	 
	 $date=date('Ymdhis');	 
	 $ins_deposit="insert into donate_pos_deposit (pos_id,deposit,deposit_type,bank_name,account_number,deposit_date)
	               values($pos_id,'$amount','$deposit_type','$bank_name','$account_number','$date')";
	 mysql_query($ins_deposit);				 
	 echo "Your given request has been successfully accepted";
	 
	 }
	 
	 ?>
	 
    
     
    </div>
    <!-- /content -->
	