 


<!-- Content (Right Column) -->
    <div id="content" class="box">       
	  
	
	       <div class="title" >Deposit Information</div> 
		   
		 
    
	
	
	
		 <div class="form_tab">	
		<form method="POST" action="">   
	    <div class="form">
	  
		
		 
		  
		  
        
		
		<?php 
		 $deposit_id=$_GET['deposit_id'];
		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev='.$_GET['nev'];
		$qry = mysql_query("SELECT  * from donate_pos_deposit where id=$deposit_id"); 		
		
		$row=mysql_fetch_array($qry);
		
		$pos_id=$row['pos_id'];
		
		$pos_mobile_no=$row['mobile_no'];
		$deposit=$row['deposit'];
		$bank_name=$row['bank_name'];
		$account_number=$row['account_number'];
		$deposit_date=$row['deposit_date'];
		$deposit_type=$row['deposit_type'];
		$status=$row['status'];
	
		?>
		<form method="POST" action="">
		<div class="form_row">
      <label class="left"> Donate Pos Id: </label>	  	  
	  <input type="text" id="pos_id"  name="pos_id" class="form_input" value ="<?php echo $pos_id;?>" readonly="readonly">	  	  
	  </div>	


	  
	  
	  
	  
	  <div class="form_row">
      <label class="left">Deposted Amount: </label>	  	  
	  
	  <input type="text" id="deposit"  name="deposit" class="form_input" value ="<?php echo $deposit;?>" readonly="readonly">	  	  
	  </div>	  

	  <div class="form_row">
      <label class="left">Bank Name: </label>	  	  
	  
	  <input type="text" id="bank_name"  class="form_input" value ="<?php echo $bank_name;?>" readonly="readonly">	  	  
	  </div>	  

	  <div class="form_row">
      <label class="left">Account Number: </label>	  	  
	  
	  <input type="text" id="account_number"  class="form_input" value ="<?php echo $account_number;?>" readonly="readonly">	  	  
	  </div>	  

		<div class="form_row">
      <label class="left">Deposit date: </label>	  	  
	  
	  <input type="text" id="deposit_date"  class="form_input" value ="<?php echo $deposit_date;?>" readonly="readonly">	  	  
	  </div>	  
	  
	  <div class="form_row">
      <label class="left">Deposit Type: </label>	  	  
	  
	  <input type="text" name="deposit_type" id="deposit_type"  class="form_input" value ="<?php echo $deposit_type;?>" readonly="readonly">	  	  
	  </div>	  
	  
	  <?php
	  if ($status=='Panding')
	  {
	  ?>
<input type="submit" id="confirm" name="confirm" value="Confirm....."/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" id="reject" name="reject" value="Reject....."/>
<?php
}
?>
</form>
    </div>
	</div>
	
	<?php
	if(isset($_POST['confirm']))
	{
	$pos_id=$_POST['pos_id'];
	 $deposit=$_POST['deposit'];
	 $deposit_type=$_POST['deposit_type'];
				if ($deposit_type=='collection')
				{
				//$sel_pos_col="select * from pos_collection_amount where pos_id=$pos_id and status='panding'";
				$sel_pos_col="select a.id as collection_id,a.collection_amount as collection_amount,a.login_id as login_id,
				a.member_mobileno as member_mobile,b.service_charge as service_charge,b.security_money as security_money,
				c.product_price as product_price,(c.product_price-b.service_charge) as pro_com_price from pos_collection_amount a,
				donate_pos b,product_list c where a.pos_id=$pos_id and  b.id=$pos_id and a.status='panding'"; 
				
				$result_pos_col=mysql_query($sel_pos_col);
				$total_id=0;
				$deposit_adjust=0;
					while ($row_pos_col=mysql_fetch_array($result_pos_col))
					{
					$collection_id=$row_pos_col['collection_id'];
					 $collection_amount=$row_pos_col['collection_amount'];
					$product_com_price=$row_pos_col['pro_com_price'];
					$member_login_id=$row_pos_col['login_id'];
					$member_mobileno=$row_pos_col['member_mobile'];
					
						if ($deposit>=$collection_amount)
						{
						         		
                           if ($collection_amount==$product_com_price)						
								{
                                 		
									
								  
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
                                                         $date=date('Ymdhis');
						                      			$qry_pin_to_pos="insert into alocation_id_to_pos (pos_id,member_login_id,member_mobile_no,alo_login_id_set,alo_date,alo_for,deposit_id,collection_id)
														 values($pos_id,'$member_login_id','$member_mobileno','$del_pin','$date','Member',$deposit_id,$collection_id)";
														 mysql_query($qry_pin_to_pos);
														 
					                             $total_id=$total_id+3;
												 $deposit_adjust=$deposit_adjust+$collection_amount;
             									$deposit=$deposit-$collection_amount;	  
												
												
														
								}
						
															  
									$update_pos_depost="update donate_pos_deposit set status='Confirmed',no_of_id=$total_id,deposit_adjust='$deposit_adjust'  where id=$deposit_id";
					            mysql_query($update_pos_depost);						  
	 
						
						}
						/*
						*/
					}
					
						
						echo "Id are alocated to your account as per your given deposit.Thanks for stay with us";
												
					
					
					
				}
	}
	
	?>
     
    </div>
    <!-- /content -->
	