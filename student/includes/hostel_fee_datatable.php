<html>
<head>
<script type="text/javascript">
			$('#example').dataTable({  	"sPaginationType": "full_numbers"	 	});				
</script>			
</head>
<body>
<?php   require_once('../db.php');
		$class_name = trim($_POST["class_name"]);
		$branch_id = trim($_POST["branch_id"]);
?>
<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
					
						  <th>Class Name</th>
						  <th>Fee Name </th>
						  <th>Amount</th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
					$class_id=$class_name;
					$qry1="select class_name from std_class_config where id=$class_id and branch_id=$branch_id";
					$qr1=mysql_query($qry1);
					$row1=mysql_fetch_array($qr1);
					$class_name=$row1['class_name'];

					if (isset($_POST['submit'])){
						$qry = mysql_query("SELECT  * from tbl_class_fee_info where class_id=$class_id and fee_head_id=4 and branch_id=$branch_id");
						$count=1;
						while ($row=mysql_fetch_array($qry))
						{
												$mod=$count%2;
												if ($mod==0)
												{
												echo "<tr>";
												}
												else
												{
												echo "<tr class=\"bg\">";
												}
									$fee_tbl_id=$row['id'];
									$class_id=$row['class_id'];
									$fee_head_id=$row['fee_head_id'];

								  $qry2="select fee_head from tbl_class_feehead where branch_id='$branchid' and fee_head='hostel' and id='$fee_head_id'" ;
								  $qr2=mysql_query($qry2);
								  $row2=mysql_fetch_array($qr2);
								  $fee_name=$row2['fee_head'];

								  $amount=$row['amount'];
						 

							echo  "<td> $class_name </td>";
							echo  "<td>$fee_name</td>";
							echo  "<td>$amount</td>";		
							echo "</tr>";		
							$count++;
						}			
					}
							
					?>
					</tbody>
					<tfoot>
						<tr>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				</div>
				</table>
</body>
</html>												