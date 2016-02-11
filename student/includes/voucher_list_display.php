<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
<div id="content" class="box">
<?php
	include('db.php');
	$str = "select * from `std_voucher_summery`";	
	 
	//$sql = mysql_query($str);	
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <td>Voucher ID</td>
							   <td>Student ID </td>
							   <td>Total Amount</td>
							   <td>Payment Status</td>
							   <td>Payment Date</td>
							   <td>branchid </td>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
							    $id 		  = $res[0];
								$voucher_id   = $res[1];
								$std_id	      = $res[2];
								$total_amnt   = $res[3];
								$payment_stat = $res[4];
								$payment_date = $res[5];
								$branch_id    = $res[6];							
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$voucher_id </td>";
							   echo  "<td>$std_id</td>";
							   echo  "<td>$total_amnt </td>";
							   echo  "<td>$payment_stat </td>";
							   echo  "<td>$payment_date</td>";
							   echo  "<td>$branch_id </td>";
							   echo "</tr>";		
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
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</div>