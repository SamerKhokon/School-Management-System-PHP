<html>
<head>
    <script type="text/javascript">
	  $(document).ready(function(){
		$('#example').dataTable({
		   "sPaginationType": "full_numbers"				
		});	          
	  });
	</script>
</head>
<body>
<?php   require_once('../db.php');
		$teacher = trim($_POST['teacher']);
		$branch_id  = trim($_POST['branch_id']); ?>
<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>					
						  <th>Teacher</th>
						  <th>Date From</th>
						  <th>Date To</th>
						  <th>Month</th>
						  <th>No of Days</th>				  
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
					
					$qry1="SELECT teacher_id,
					(SELECT teacher_name FROM std_teacher_info WHERE id=a.teacher_id) AS
					teacher_name,date_from,date_to,
					DATE_FORMAT(for_month,'%M-%Y') AS for_month,no_of_days
					 FROM `tbl_teacher_leave_info` AS a WHERE branch_id=$branch_id and teacher_id=$teacher";
					$qr1=mysql_query($qry1);
					while($row=mysql_fetch_array($qr1))
					{
						echo "<tr class=\"bg\">";
						echo "<td>".$row['teacher_name']."</td>";
						echo "<td>".$row['date_from']."</td>";
						echo "<td>".$row['date_to']."</td>";
						echo "<td>".$row['for_month']."</td>";
						echo "<td>".$row['no_of_days']."</td>";
						echo "</tr>";		
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
						</tr>
					</tfoot>
				</table>
				</div>
				</table>
</body>
</html>				