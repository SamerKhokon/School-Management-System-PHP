<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>


     <div id="content" class="box">  
      
	  
	
	      <div class="title" >Transefer Id </div> 
		   <div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  
	  
	  
	  <form method="POST" action="">
	  <dl>
	<dt> 
		<label for="firstname">To Member:</label>
	</dt>
	<dd>
		<input
			name="to_login_id"
			id="to_login_id"
			readonly="readonly"
			type="text"
			class="form_inputs" />
		<span class="hint">To Member.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dt>
		<label for="lastname">Confirm Member:</label>
	</dt>
	<dd>
		<input
			name="confirm_login_id"
			id="confirm_login_id"
			readonly="readonly"
			type="text"
			class="form_inputs" />
		<span class="hint">Confirm Member.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	
	
		  
	  <!--<div class="form_row">    
          <label class="left"> To Member: </label>	  	  
	  <input type="text" name="to_login_id" id="to_login_id" class="form_input" readonly="readonly" >
	  
	  </div>
	  
	<div class="form_row">
    
          <label class="left"> Confirm Member: </label>	  
	  
	  <input type="text" name="confirm_login_id" id="confirm_login_id" class="form_input" readonly="readonly" >
	  
	  
	  </div>-->
	  
	  
	  
	  
	  <dt>
          <label >Number of Packeg: </label>	  
	  </dt>
	  <dd>
	  <select  id="no_of_pak" name="no_of_pak" class="form_inputs"  >
	  <?php 
	  
	  for($i=1;$i<=10;$i++)
	  {
	  echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  
	  ?>
	  </select>
	  <span class="hint">Pick a famous year to be born in.<span class="hint-pointer">&nbsp;</span></span>
	 </dd>
	  
	  <dt>
          <label >Confirm Number : </label>	  
	  </dt>
	  <dd>
	  <select  id="con_no_of_pak" name="con_no_of_pak" class="form_inputs"  >
	  <?php 
	  
	  for($i=1;$i<=10;$i++)
	  {
	  echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  ?>
	  </select>
	  <span class="hint">Pick a famous year to be born in.<span class="hint-pointer">&nbsp;</span></span>
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
	  $no_of_pak=$_POST['no_of_pak'];
	  $con_no_of_pak=$_POST['con_no_of_pak'];
	  $tologin_id=$_POST['to_login_id'];
	  $confirm_login_id=$_POST['confirm_login_id'];
	  
	  
	  
          
	   
	        $sel_pin="select count(*) from user_info where login_id='$tologin_id' and status='Active' ";
		$result_pin=mysql_query($sel_pin);
		$row_pin=mysql_fetch_array($result_pin);		
		
	  
	  
	  if ( ($row_pin[0]==1) and ($to_login_id!="") and ($tologin_id==$confirm_login_id) and ($no_of_pak=$con_no_of_pak))
	  {
	   $nO_id=$no_of_pak*3;	 
	  
	         $update_date=date('Ymdhis');
		 $creation_time=date('d/m/Y h:i:s');		 
		 $chk_pin="select count(*) as count_pin from alocation_id_to_member where member_id='$login_id'";
		 $result_chk_pin=mysql_query($chk_pin);
		 $row_chk_pin=mysql_fetch_array($result_chk_pin);
		 
		  if ($row_chk_pin['count_pin']>1)
		 {
		 
		 
		 
		 $ins_pay_req="insert into transfer_id_record (pos_id,from_member_id,to_member_id,alo_id,alo_date,request_id)
                                 select $pos_id,member_login_id,'$to_login_id',alo_login_id_set,' $update_date' from alocation_id_to_member where   member_login_id='$login_id' order by id limit $no_id "; 		 
		 
		 mysql_query($ins_pay_req);
		 $update="update alocation_id_to_member set member_login_id='$tologin_id',alo_date='$update_date' where member_login_id='$login_id' order by id limit $no_id";
		 mysql_query($update);
		 
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
	
	
	