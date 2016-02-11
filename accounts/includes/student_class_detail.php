<?php   include('db.php'); 
		session_start();		
        $branchid   = $_SESSION['LOGIN_BRANCH'];
  	    $class_name = $_POST['class_name'];
	    $sec_name   = $_POST['sec_name'];
		$smid = $_SESSION['SM_id'];
		$menuid = $_SESSION['menuid'];
		
		
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
								  <th>Roll</th>          
								  <th>Student&nbspName</th>
								  <th>Class </th>
								  <th>Section</th>
								  <th>Open Day </th>  
								  <th>Attend</th>        
								  <th>Absent</th>
								  <th>Leave </th>         
								  <th>Status</th>
								  <th>Present Result</th>
								</tr>
							</thead>
							<tbody>
						 <?php 						 					
				
						$qry = mysql_query("SELECT  * from std_class_info where class_id=$class_name and class_sec='$sec_name' and branch_id=$branchid");
								$count=1;
								while ($row=mysql_fetch_array($qry))
								{
									$mod=$count%2;
									if ($mod==0)	{
										echo "<tr>";
									}else{
										echo "<tr class=\"bg\">";
									}
								  $stu_id=$row['stu_id'];
								  $roll=$row['class_roll'];
								  $student_name=$row['stu_name'];
								  $class_name=$row['class_name'];
								  $class_sec=$row['class_sec'];
								  $total_open_day=$row['total_open_day'];
								  $total_atten=$row['total_atten'];
								  $total_leave=$row['total_leave'];
								  $total_abs=$row['total_abs'];
								  $status=$row['stuts'];
								  $result=$row['result'];
								echo  "<td>$roll</td>";
								 $url='?SM_id='.$smid.'&menu_id='.$menuid.'&stid='.$stu_id.'&nev=student_profile_information_view';
								echo  "<td><a href='$url'>$student_name</a></td>";
								echo  "<td>$class_name</td>";
								echo  "<td>$class_sec</td>";
								echo  "<td>$total_open_day</td>";
								echo  "<td>$total_atten</td>";	
								echo  "<td>$total_leave</td>";
								echo  "<td>$total_abs</td>";
								echo  "<td>$status</td>";
								echo  "<td>$result</td>";
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
								</tr>
							</tfoot>
				</table>
			</div>  <!-- end demo div -->
		</table>