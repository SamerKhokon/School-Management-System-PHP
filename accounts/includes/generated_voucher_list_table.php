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
								  <th>Roll</th>  
								  <th>Amount</th>        
								  <th>Month</th>
								  <th>PayDate </th>         
								  <th>Status</th>
								</tr>
							</thead>
							<tbody>

<?php           require_once('../db.php');


				$class_id   =trim($_POST["class_id"]);
				$month_year  =trim($_POST["yearmonth"]);
				$branchid    =trim($_POST["branchid"]);
				
				
				$parse = explode("-",$month_year);
				$month = $parse[0];
				$year = $parse[1];
				
				$month_date = $year."-".date('m',strtotime($month))."-01";								
				global $where;
				
               
				$where = " WHERE 1=1 AND class_id=$class_id AND month_date='$month_date' AND month='$month_year'";								
				
				$str = "SELECT id,std_id,std_name,class_id,class_name,section,class_roll,amount,
				DATE_FORMAT(`month_date`,'%b-%Y') AS `month_name`,pay_date,
				status,branch_id FROM std_fee_collection ".$where;
			
				$sql = mysql_query($str);					
				$count = 1;
				$total_amount = 0;
				while($res = mysql_fetch_assoc($sql) ) 
				{  
					$mod=$count%2;
					if ($mod==0)	{
						echo "<tr>";
					}else{
						echo "<tr class=\"bg\">";
					}				
					$slno            = $res['id'];	
					$std_id          = $res['std_id'];
					$std_name        = $res['std_name'];
					$class_id        = $res['class_id'];
					$class_name      = $res['class_name'];
					$section         = $res['section'];
					$class_roll      = $res['class_roll'];
					$amount          = $res['amount'];
					$pay_date        = $res['pay_date'];
					$pay_month       = $res['month_name'];
					$pay_status      = $res['status'];
					$total_amount += $amount;
					?>  
								<td><?php echo $std_id;?></td>
								<td><?php echo $std_name;?></td>
								<td><?php echo $class_name;?></td>
								<td><?php echo $section;?></td>
								<td><?php echo $class_roll;?></td>
								<td><?php echo $amount;?></td>
								<td><?php echo $pay_month;?></td>
								<td><?php echo $pay_date;?></td>								
								<td><?php echo $pay_status;?></td>
                                </tr>   								
				<?php    $count++ ;
				}    ?>					
							</tbody>
							<tfoot>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Total:&nbsp;<?php echo $total_amount;?></th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>			
								</tr>
							</tfoot>
				</table>
			</div>  <!-- end demo div -->
		</table>				