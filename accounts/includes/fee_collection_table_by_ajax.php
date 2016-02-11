<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
<?php
	include('../db.php');
	$month_year = trim($_POST["month_year"]);
	$stu_id     = trim($_POST["stu_id"]);								
	$branchid   = trim($_POST["branchid"]);
	
	$parse = explode("-",$month_year);
	$month = $parse[0];
	$year = $parse[1];
	
	$month_date = $year."-".date('m',strtotime($month_year))."-01";
	
	$str = "SELECT * FROM std_fee_details WHERE 
	MONTH='$month_year' AND std_id='$stu_id' and month_date='$month_date' AND branch_id=$branchid";	
	 
	//$sql = mysql_query($str);	
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>ID </th>							
							   <th>name </th>
							   <th>class </th>
							   <th>Roll</th>
							   <th>Fee Head </th>
							   <th align="right">Amount</th>
							   <th>Month</th>
							   <th>Collection Status</th>							   
							</tr>
						</thead>
						<tbody>
<?php
						$count = 0;
						$total = 0;
						$qr=mysql_query($str);		
						while ($rs=mysql_fetch_array($qr))
						{
						   $slno              = $rs['id'];
						   $class_id          = $rs['class_id']; 
						   $class_name        = $rs['class_name']; 
						   $std_id            = $rs['std_id']; 
						   $roll              = $rs['roll'];
						   $std_name          = $rs['std_name']; 
						   $fee_head_name     = $rs['fee_head_name']; 
						   $category          = $rs['category']; 
						   $amount            = $rs['amount'];
						   $month             = $rs['month'];
						   $collection_status = $rs['collection_status'];
						   $total   += $amount;
							$mod=$count%2;
							if ($mod==0){
								echo "<tr>";
							}else{
								echo "<tr class=\"bg\">";
							}	   
							echo  "<td>$std_id </td>";
							echo  "<td>$std_name </td>";							  
							echo  "<td>$class_name </td>";
							echo  "<td>$roll </td>";
						    echo  "<td>".ucfirst($fee_head_name)." </td>";
						    echo  "<td align='center'>$amount </td>";
						    echo  "<td>$month  </td>";
						    echo  "<td>$collection_status</td>";
							echo  "</tr>";		
							$count++;
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
								<th>Total:&nbsp;<?php echo $total;?></th>								
								<th>&nbsp;</th>
								<th>&nbsp;</th>						
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
	
	<br/></br></br>
	<input type="button" style="height:40px;font-weight:bold;background-color:#999ff9;width:120px;color:#fff;" id="fee_paid_btn" value="Paid"/>
	
<?php function get_section_name($class_id,$section_id) 
      {
		$str ="SELECT section_name FROM `std_class_section_config` WHERE class_id=$class_id AND id=$section_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];	
	  }
?>