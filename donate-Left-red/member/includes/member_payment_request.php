 


<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  
	
	      <div class="title" >Payment request Information</div> 
		   <div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  
	  
	  
	   <form method="POST" action="">
  
    
	  
	<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" name="login_id" id="login_id" class="form_input" readonly="readonly" value="<?php echo $login_id;?>">
	  
	  
	  </div>
	  
	  <div class="form_row">
      <label class="left">Number of Packeg: </label>	  
	  
	  <select  id="no_of_pak" name="no_of_pak" class="form_input">
	  <?php 
	  for($i=1;$i<=10;$i++)
	  {
	  echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  ?>
	  </select>
	  <?php
	  $sql_qry="select product_price from product_list where product_name='ID' limit 1"; 
	  $result=mysql_query($sql_qry);
	  $row=mysql_fetch_array($result);
	  echo 'Per Packeg'.$row['product_price'].'Tk';
	  echo '<input type="hidden" name="price" value="'.$row['product_price'].'">';
	  ?>
	  
	  </div>
	
	  
	  <div class="form_row">
      <label class="left">Amount: </label>	  	  
	  <input type="text" id="Amount" name="amount" class="form_input">
	  </div>
	  
	  
	  
	  <div class="form_row">
 
      <label class="left"> Agent Name: </label>	  	  
	  
	  <select  id="agent_name" name="agent_name" class="form_input">
	  
	  <?php $sql ="select * from collection_agent";
	  $result=mysql_query($sql);
	  while($row=mysql_fetch_array($result))
	  {
	  echo '<option value="'.$row['agent'].'">'.$row['agent'].'</option>';
	  }
	  
	  ?>
	  
	  </select>How to sent Money
	  </div>
	  
	  
	 
	  <div class="form_row">
      <label class="left">Transection Id:</label>	  	  
	  <input type="text" id="trans_id" name="trans_id" class="form_input">*
	  </div>
	  
	   

	  
	
	
	  
	  </b>
      <input type="submit" id="submit" name="submit" value="submit"/>
      </form>
	  </div>
	  </div>  
	  
	  
	  
	  
	  
	  <?php
	  
	  if (isset($_POST['submit']))
	  {
	  $no_of_pak=$_POST['no_of_pak'];
	  $amount=$_POST['amount'];
	  $agent_name=$_POST['agent_name'];
	  $trans_id=$_POST['trans_id'];
	  $price=$_POST['price'];
	  $pak_price=$no_of_pak*$price;
	   
	   
	  $quentity=$no_of_pak*3;
	  
	  
	  
	  if (($amount=$pak_price) and $amount!="" and  $trans_id!="")
	  {
	  
	     $payment_date=date('Ymdhis');
		 $creation_time=date('d/m/Y h:i:s');		 
		 $chk_pin="select count(*) as count_pin from payment_request where payment_receive_pin='$trans_id'";
		 $result_chk_pin=mysql_query($chk_pin);
		 $row_chk_pin=mysql_fetch_array($result_chk_pin);
		 
		 
		 
										 
		 
		  if ($row_chk_pin['count_pin']<1)
		 {		 
		 
		 $ins_pay_req="insert into payment_request (login_id,amount,product_quentity,payment_agent,payment_receive_pin,payment_date,creation_time,pos_id) 
		 values('$login_id','$amount','$quentity','$agent_name','$trans_id','$payment_date','$creation_time',(select pos_id from user_info where login_id='$login_id' limit 1))";
		 mysql_query($ins_pay_req);
		 echo "<h1>Data successfully entered.your request waiting for Approval.</h1>";
		 
		 }
		 else
		 {
		 
		 echo "<h1>Duplicate pin number entered</h1>";
		 }
	  
	  
	  }
	  
	  else
	  {
	   echo "<h1>you have given wrong information</h1>";
	  }
	  
	  
	  
	  
	  
	  }
	  
	  ?>

	

	
		
	  
	  
	  
	  
	  
     
    </div>
    <!-- /content -->
	
	
	