<?php  require_once("../db.php");
		
	$class_id   = trim($_POST["class_id"]);
	$month_year = trim($_POST["month_year"]);
	$branch_id  = trim($_POST["branch_id"]);
	
	$parse = explode("-",$month_year);
	$month = $parse[0];
	$year = $parse[1];	
	$month_date = $year."-".date('m',strtotime($month))."-01";								
	global $where;
				
    /*************************
	** fee details amendment
	**************************/	
	
	$str = "SELECT id,class_id,section_id,class_name,std_id,std_name,amount,month,checker_status
	FROM std_fee_details WHERE checker_status='checked' AND collection_status!='paid' and month_date='$month_date'";
	$sql   = mysql_query($str);					
	
?>
<script type="text/javascript">
 $(document).ready(function(){			   
	$('#example').dataTable({
	  "sPaginationType": "full_numbers"				
	});			
});				
</script>
<table width=100% id="jq_tbl">	
		<div id="demo">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
			<tr>
			  <th>ID</th>          
			  <th>Student&nbsp;Name</th>
			  <th>Class </th>
			  <th>Section</th>
			  <th>Amount</th>        
			  <th>Month</th>
			  <th>Status</th>
			  <th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php       $count = 1;
			$total_amount = 0;
			while($res = mysql_fetch_assoc($sql) ) 
			{  
								
					$slno            = $res['id'];	
					$std_id          = $res['std_id'];
					$std_name        = $res['std_name'];
					$class_id        = $res['class_id'];
					$class_name      = $res['class_name'];
					$section         = $res['section_id'];
					$amount          = $res['amount'];
					$pay_month       = $res['month'];
					$pay_status      = $res['checker_status'];
					//$total_amount += $amount;
					$voucher_counter  = voucher_exist_checker($std_id,$month_date);
					
					if( $voucher_counter ==0 )
					{
					
						$mod=$count%2;
						if ($mod==0)	{
							echo "<tr>";
						}else{
							echo "<tr class=\"bg\">";
						}						
?>  
						<td><?php echo $std_id;?></td>
						<td><?php echo $std_name;?></td>
						<td><?php echo $class_name;?></td>
						<td><?php echo $section;?></td>
						<td><?php echo $amount;?></td>
						<td><?php echo $pay_month;?></td>
						<td><?php echo $pay_status;?></td>
						
						<td><a href="#" class="ament_fee_check" id="<?php echo $std_id.'|'.$month_date;?>">Checked</a></td>						
						</tr>   								
<?php				    $count++ ;
					}   
			}	
?>					
			</tbody>
			<tfoot>
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>									
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>									
					<th>&nbsp;</th>			
				</tr>
			</tfoot>
		</table>
		</div>  <!-- end demo div -->
	</table>	
<?php
	function voucher_exist_checker($std_id,$month_date)
	{
	    $str = "SELECT COUNT(*) FROM std_voucher_summery WHERE std_id='$std_id' AND month_date='$month_date'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		if($res[0]=="")
			return 0;
		else
			return $res[0];
	}
?>		
	