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
					      <th>Class</th>
						  <th>Scholarship Name </th>
						  <th>Sponsored By</th>						  
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

					    $string = "SELECT  * from tbl_scholarship_info where class_id=$class_id and branch_id=$branch_id";
						$qry = mysql_query($string);
						$count = 0;
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
                                $class_id = $row[1];
								$scholarship_name = $row[2];								
								$sponsored_by = $row[3];								
								$amount = $row[4];
 
							echo  "<td>Class-$class_id </td>";
							echo  "<td>$scholarship_name</td>";
							echo  "<td>$sponsored_by</td>";		
							echo  "<td>$amount</td>";									
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
						</tr>
					</tfoot>
				</table>
				</div>
				</table>
</body>
</html>				