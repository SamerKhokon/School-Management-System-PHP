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
	$str = "SELECT 	`id`,`class_id`,`section_id`,`class_name`,`std_id`, 
	`roll`,`std_name`,`fee_head_name`,`category`,`amount`,`month`, 
	`payment_date`,`group_id`,`branch_id`,`generation_status`,`collection_status`
	 FROM `school`.`std_fee_details`";	
	 
	//$sql = mysql_query($str);	
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <td>class </td>
							   <!--<td>stdid  </td>
							    <td>roll </td> -->
							   <td>name </td>
							   <td>feehead</td>
							   <!-- <td>category </td> -->
							   <td>amount </td>
							   <td>month  </td>
							   <td>paymentdate  </td>
							  <!-- <td>groupid  </td>-->
							   <td>branchid </td>
							   <td>generationstatus </td>
							   <td>collectionstatus </td>
							   <td>actions </td>							   
							</tr>
						</thead>
						<tbody>
					 <?php
						 

					  $count = 0;
						  $qr=mysql_query($str);		
							while ($rs=mysql_fetch_array($qr)){
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
							   $payment_date      = $rs['payment_date']; 
							   $group_id          = $rs['group_id']; 
							   $branch_id         = $rs['branch_id']; 
							   $generation_status = $rs['generation_status']; 
							   $collection_status = $rs['collection_status'];							
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$class_name </td>";
							   //echo  "<td>$std_id  </td>";
							   //echo  "<td>$roll </td>";
							   echo  "<td>$std_name </td>";
							   echo  "<td>$fee_head_name </td>";
							   //echo  "<td>$category </td>";
							   echo  "<td>$amount </td>";
							   echo  "<td>$month  </td>";
							   echo  "<td>$payment_date  </td>";
							   //echo  "<td>$group_id  </td>";
							   echo  "<td>$branch_id </td>";
							   echo  "<td>$generation_status </td>";
							   echo  "<td>$collection_status </td>";
                               echo  "<td><a>edit</a><a>delete</a></td>";							   
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
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>						
								<th>&nbsp;</th>						
								<th>&nbsp;</th>						
								<!--<th>&nbsp;</th>						
								 <th>&nbsp;</th>-->														
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</div>