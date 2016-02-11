<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script> 
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>


<?php require_once("db.php"); ?>
<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  
	
	      <div class="title" >Pos cash collection</div> 
		   <div class="form_tab">	
		  
	 

	   <form method="POST" action="">
  
    
	  <dl>
	
	<dt>
		<label for="password"> Login Id :</label>
	</dt>
	<dd>
		 <input type="text" name="login_id" id="login_id" class="form_inputs"  >
		<span class="hint">Login Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	<!--<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" name="login_id" id="login_id" class="form_input"  >
	  
	  
	  </div>-->
	  <dt>
		<label for="password"> Confirm Login Id:</label>
	</dt>
	<dd>
		<input type="text" name="confirm_login_id" id="login_id" class="form_inputs"  >
		<span class="hint">Confirm Login Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  
	  
	  	<!--<div class="form_row">
    
      <label class="left">Confirm Login Id: </label>	  
	  
	  <input type="text" name="confirm_login_id" id="login_id" class="form_input"  >
	  
	  
	  </div>-->

	   <dt>
		<label for="password">Number of Packeg:</label>
	</dt>
	<dd>
		<select  id="no_of_pak" name="no_of_pak" class="form_inputs">
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
	  //echo 'Per Packeg'.$row['product_price'].'Tk';
	  echo '<input type="hidden" name="price" value="'.$row['product_price'].'">';
	  ?>
		<span class="hint"><?php  echo 'Per Packeg'." ".$row['product_price'].'Tk';?><span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  
	  
	  <!--<div class="form_row">
      <label class="left">Number of Packeg: </label>	  
	  
	  <select  id="no_of_pak" name="no_of_pak" class="form_input">
	  <?php 
	  //for($i=1;$i<=10;$i++)
	  {
	  //echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  ?>
	  </select>
	  <?php
	  //$sql_qry="select product_price from product_list where product_name='ID' limit 1"; 
	  //$result=mysql_query($sql_qry);
	 // $row=mysql_fetch_array($result);
	 // echo 'Per Packeg'.$row['product_price'].'Tk';
	 // echo '<input type="hidden" name="price" value="'.$row['product_price'].'">';
	  ?>
	  
	  </div>
	-->
	 <dt>
		<label for="password">Amount:</label>
	</dt>
	<dd>
		  <input type="text" id="Amount" name="amount" class="form_inputs">
		<span class="hint">Amount.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  
	  <!--<div class="form_row">
      <label class="left">Amount: </label>	  	  
	  <input type="text" id="Amount" name="amount" class="form_input">
	  </div>-->
	  
	   <dt>
		<label for="password">Agent Name:</label>
	</dt>
	<dd>
		  <select  id="agent_name" name="agent_name" class="form_inputs">
	  
	  <?php $sql ="select * from donate_pos where id=$pos_id";
	  $result=mysql_query($sql);
	  while($row=mysql_fetch_array($result))
	  {
	  echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	  }
	  
	  ?>
	  
	  </select>
		<span class="hint">Agent Name.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<!--  
	  <div class="form_row">
 
      <label class="left"> Agent Name: </label>	  	  
	  
	  <select  id="agent_name" name="agent_name" class="form_input">
	  
	  <?php// $sql ="select * from donate_pos where id=$pos_id";
	  $result=mysql_query($sql);
	  while($row=mysql_fetch_array($result))
	  {
	  echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	  }
	  
	  ?>
	  
	  </select>
	  </div>-->
	  
	   <dt>
		<label for="password">Request Id:</label>
	</dt>
	<dd>
		  <input type="text" id="request_id" value ="<?php echo date('Ymdhis').rand(4,999); ?>" name="request_id" class="form_inputs" readonly="readonly">
		<span class="hint">Request Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	   
	  <!--<div class="form_row">
      <label class="left">Request Id: </label>	  	  
	  <input type="text" id="request_id" value ="<?php echo date('Ymdhis').rand(4,999); ?>" name="request_id" class="form_input" readonly="readonly">
	  </div>-->
	  
	  
	  
	 
	  
	   

	  
	
	
	  
	  </b>
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

	  
	  
	  
	  
	  
	  <?php
	  
	  if (isset($_POST['submit']))
	  {
	  $no_of_pak=$_POST['no_of_pak'];
	  $amount=$_POST['amount'];
	  $agent_name=$_POST['agent_name'];
	  //$trans_id=$_POST['trans_id'];
	  $price=$_POST['price'];
	  $total_price=$no_of_pak*$price;
	  $member_login_id=$_POST['login_id'];
	  $request_id=$_POST['request_id'];	  
	  $quentity=$no_of_pak*3;
	  
	  $sel_qry="select count(*) as chk_req from alocation_id_to_pos where request_id='$request_id'";
	  $result=mysql_query($sel_qry);
	  $row=mysql_fetch_array($result);
	  $chk_req_id=$row['chk_req'];
	  if (($amount=$total_price) and $amount!="" and ($login_id==$confirm_login_id) and($chk_req_id<1))
	  {
	  
	     $allocation_date=date('Ymdhis');
		 $creation_time=date('d/m/Y h:i:s');		 
		 $chk_login_id="select count(mobile_no) as chk_login_id,mobile_no from user_info where login_id='$member_login_id' group by mobile_no";
		 $result_chk_login_id=mysql_query($chk_login_id);
		 $row_chk_login_id=mysql_fetch_array($result_chk_login_id);
		 $mem_mobile_no=$row_chk_login_id['mobile_no'];
		 //echo $row_chk_login_id['chk_login_id'];
		  if ($row_chk_login_id['chk_login_id']==1)
		 {		 
		 
		 
 				  $sel_pin_no ="select * from pin_no where status='Available' order by sno limit $quentity ";
				  $rusult_sel_pin=mysql_query($sel_pin_no);
				  $sno_id="";
				  $del_pin="";
				  while($row_sel_pin=mysql_fetch_array($rusult_sel_pin))
				  {
				  
				  $sno_id.=$row_sel_pin['sno'].",";
				  $del_pin.=$row_sel_pin['login_id'].",";
				  $alo_login_id=$row_sel_pin['login_id'];
				  echo $ins_id="insert into alocation_id_to_pos (pos_id,member_login_id,member_mobile_no,alo_login_id_set,alo_date,alo_for,request_id)
				            values ($pos_id,'$member_login_id','$mem_mobile_no','$alo_login_id','$allocation_date','Member','$request_id')";
				  mysql_query($ins_id);
				  
				  $ins_id="insert into alocation_id_to_member (pos_id,member_login_id,member_mobile_no,alo_login_id_set,alo_date,alo_for,status)
				            values ($pos_id,'$member_login_id','$mem_mobile_no','$alo_login_id','$allocation_date','Member','Active')";
				  mysql_query($ins_id);
				  
				  
				  }     
				  $sno_id=substr($sno_id,0,-1);
				  $update_pin_stat="update pin_no set status='processing' where sno in($sno_id)";
				  mysql_query($update_pin_stat);	  
				  
				  $sms="The $del_pin pins from now available for you for sale.";
				  
		 
		 
		 
		 }
		 else
		 {
		 
		 echo "<h1>You have given wrong login Id.Please enter valid information.</h1>";
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
	
	
	